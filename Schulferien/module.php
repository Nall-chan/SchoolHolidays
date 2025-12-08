<?php

declare(strict_types=1);

/**
 * @addtogroup schulferien
 * @{
 *
 * @file          module.php
 *
 * @author        Michael Tröger <micha@nall-chan.net>
 * @copyright     2025 Michael Tröger
 * @license       https://creativecommons.org/licenses/by-nc-sa/4.0/ CC BY-NC-SA 4.0
 *
 * @version       3.02
 */

/**
 * Schulferien ist die Klasse für das IPS-Modul 'Schulferien'.
 * Erweitert IPSModule.
 */
class Schulferien extends IPSModuleStrict
{
    /**
     * Interne Funktion des SDK.
     */
    public function Create(): void
    {
        parent::Create();
        $this->RegisterPropertyInteger('Region', 2);
        $this->RegisterPropertyString('BaseURL', 'https://www.schulferien.eu/downloads/ical4.php');
        $this->RegisterTimer('UpdateSchoolHolidays', 15 * 60 * 1000, 'SCHOOL_Update($_IPS[\'TARGET\']);');
    }

    public function Migrate(string $JSONData): string
    {
        $j = json_decode($JSONData);
        if (isset($j->configuration->Area)) {
            $j->configuration->Region = $j->configuration->Area;
            unset($j->configuration->Area);
            /* Update old URL */
            if (strpos($this->ReadPropertyString('BaseURL'), 'www.schulferien.org') !== false) {
                $j->configuration->BaseURL = 'https://www.schulferien.eu/downloads/ical4.php';
            }
        }
        return json_encode($j);
    }

    /**
     * Interne Funktion des SDK.
     */
    public function ApplyChanges(): void
    {
        parent::ApplyChanges();
        $this->RegisterVariableBoolean(
            'IsSchoolHoliday',
            'Sind Ferien ?',
            [
                'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                'OPTIONS'      => json_encode([
                    [
                        'Caption'    => 'Ja',
                        'Value'      => true,
                        'IconActive' => false,
                        'IconValue'  => '',
                        'ColorActive'=> false,
                        'ColorValue' => ''
                    ],
                    [
                        'Caption'    => 'Nein',
                        'Value'      => false,
                        'IconActive' => false,
                        'IconValue'  => '',
                        'ColorActive'=> false,
                        'ColorValue' => ''
                    ]
                ])
            ]
        );
        $this->RegisterVariableString(
            'SchoolHoliday',
            'Ferien',
            [
                'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION
            ]
        );
        $this->Update();
    }

    /**
     * IPS-Instanz-Funktion 'SCHOOL_Update'.
     * Liest den Ferienkalender und befüllt die Variablen.
     *
     * @return bool True bei Erfolg, sonst false.
     */
    public function Update(): bool
    {
        try {
            $holiday = $this->GetFeiertag();
        } catch (Exception $exc) {
            trigger_error($exc->getMessage(), $exc->getCode());
            $this->SendDebug('ERROR', $exc->getMessage(), 0);
            return false;
        }

        $this->SetValue('SchoolHoliday', $holiday);
        $this->SetValue('IsSchoolHoliday', !($holiday == 'Keine Ferien'));
        return true;
    }

    /**
     * Holt den aktuellen Kalender von http://www.schulferien.org und wertet Diesen aus.
     *
     * @throws Exception Wenn Kalender nicht geladen werden konnte.
     *
     * @return string Liefert den Namen der aktuellen Ferien oder 'Keine Ferien'.
     */
    private function GetFeiertag(): string
    {
        $LastYear = [];
        if ((int) date('md') < 110) {
            $Link = $this->ReadPropertyString('BaseURL') . '?land=' . $this->ReadPropertyInteger('Region') . '&type=1&year=' . ((int) date('Y') - 1);
            $this->SendDebug('GET', $Link, 0);
            $LastYear = @file($Link);
            if ($LastYear === false) {
                throw new Exception('Cannot load iCal Data.', E_USER_NOTICE);
            }
            $this->SendDebug('LINES', (string) count($LastYear), 0);
        }
        $Link = $this->ReadPropertyString('BaseURL') . '?land=' . $this->ReadPropertyInteger('Region') . '&type=1&year=' . date('Y');
        $this->SendDebug('GET', $Link, 0);
        $ThisYear = @file($Link);
        if ($ThisYear === false) {
            throw new Exception('Error load iCal Data.', E_USER_NOTICE);
        }
        $this->SendDebug('LINES', (string) count($ThisYear), 0);
        $LastYear = array_merge($LastYear, $ThisYear);
        $FerienText = 'Keine Ferien';
        $NoOfLines = (count($LastYear) - 1);
        $Now = date('Ymd') . "\n";
        for ($Line = 0; $Line < $NoOfLines; $Line++) {
            if (strstr($LastYear[$Line], 'SUMMARY:')) {
                $FerienName = trim(substr($LastYear[$Line], 8));
                $FerienStart = trim(substr($LastYear[$Line + 1], 19));
                $FerienEnde = trim(substr($LastYear[$Line + 2], 17));
                $this->SendDebug('SUMMARY', $FerienName, 0);
                $this->SendDebug('START', $FerienStart, 0);
                $this->SendDebug('END', $FerienEnde, 0);
                if (($Now >= $FerienStart) && ($Now <= $FerienEnde)) {
                    $FerienText = trim(substr(strstr($LastYear[$Line], 'SUMMARY:'), 8));
                    $this->SendDebug('FOUND', $FerienText, 0);
                }
            }
        }
        return $FerienText;
    }
}

/* @} */
