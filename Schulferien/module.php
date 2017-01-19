<?

/**
 * @addtogroup schulferien
 * @{
 *
 * @package       Schulferien
 * @file          module.php
 * @author        Michael Tröger <micha@nall-chan.net>
 * @copyright     2017 Michael Tröger
 * @license       https://creativecommons.org/licenses/by-nc-sa/4.0/ CC BY-NC-SA 4.0
 * @version       2.00
 */

/**
 * Schulferien ist die Klasse für das IPS-Modul 'Schulferien'.
 * Erweitert IPSModule 
 */
class Schulferien extends IPSModule
{

    /**
     * Interne Funktion des SDK.
     *
     * @access public
     */
    public function Create()
    {
        parent::Create();
        $this->RegisterPropertyString("Area", "baden-wuerttemberg");
        //$this->RegisterPropertyString("BaseURL", "http://www.schulferien.org/media/ical/deutschland/ferien_");
        $this->RegisterPropertyString("BaseURL", "https://www.schulferien.eu/downloads/ical4.php");
    }

    /**
     * Interne Funktion des SDK.
     *
     * @access public
     */
    public function ApplyChanges()
    {
        if (strpos($this->ReadPropertyString("BaseURL"), 'www.schulferien.org') !== false)
        {
            IPS_SetProperty($this->InstanceID, "BaseURL", "https://www.schulferien.eu/downloads/ical4.php");
            if (IPS_HasChanges($this->InstanceID))
                IPS_ApplyChanges($this->InstanceID);
            return;
        }
        parent::ApplyChanges();

        $this->RegisterVariableBoolean("IsSchoolHoliday", "Sind Ferien ?");
        $this->RegisterVariableString("SchoolHoliday", "Ferien");
        // 15 Minuten Timer
        $this->RegisterTimer("UpdateSchoolHolidays", 15 * 60 * 1000, 'SCHOOL_Update($_IPS[\'TARGET\']);');
        // Nach übernahme der Einstellungen oder IPS-Neustart einmal Update durchführen.
        $this->Update();
    }

    ################## PUBLIC    

    /**
     * IPS-Instanz-Funktion 'SCHOOL_Update'.
     * Liest den Ferienkalender und befüllt die Variablen.
     * 
     * @return boolean True bei erfolg, sonst false.
     */
    public function Update()
    {
        try
        {
            $holiday = $this->GetFeiertag();
        }
        catch (Exception $exc)
        {
            trigger_error($exc->getMessage(), $exc->getCode());
            $this->SendDebug('ERROR', $exc->getMessage(), 0);
            return false;
        }


        $this->SetValueString("SchoolHoliday", $holiday);
        if ($holiday == "Keine Ferien")
        {
            $this->SetValueBoolean("IsSchoolHoliday", false);
        }
        else
        {
            $this->SetValueBoolean("IsSchoolHoliday", true);
        }
        return true;
    }

    ################## private

    /**
     * Holt den aktuellen Kalender von http://www.schulferien.org und wertet Diesen aus.
     *
     * @access private
     * @return string Liefert den Namen der aktuellen Ferien oder 'Keine Ferien'.
     * @throws Exception Wenn Kalender nicht geladen werden konnte.
     */
    private function GetFeiertag()
    {
        if ((int)date("md") < 110)
        {
            $jahr = date("Y") - 1;
            $link = $this->ReadPropertyString("BaseURL") . '?land=' . $this->ReadPropertyString("Area") . '&type=1&year=' . $jahr;
            $this->SendDebug('GET', $link, 0);
            $meldung = @file($link);
            if ($meldung === false)
                throw new Exception("Cannot load iCal Data.", E_USER_NOTICE);
            $this->SendDebug('LINES', count($meldung), 0);
        } else
        {
            $meldung = array();
        }
        $jahr = date("Y");
        $link = $this->ReadPropertyString("BaseURL") . '?land=' . $this->ReadPropertyString("Area") . '&type=1&year=' . $jahr;
        $this->SendDebug('GET', $link, 0);
        $meldung2 = @file($link);
        if ($meldung2 === false)
            throw new Exception("Cannot load iCal Data.", E_USER_NOTICE);
        $this->SendDebug('LINES', count($meldung2), 0);

        $meldung = array_merge($meldung, $meldung2);
        $ferien = "Keine Ferien";

        $anzahl = (count($meldung) - 1);

        for ($count = 0; $count < $anzahl; $count++)
        {
            if (strstr($meldung[$count], "SUMMARY:"))
            {
                $name = trim(substr($meldung[$count], 8));
                $start = trim(substr($meldung[$count + 1], 19));
                $ende = trim(substr($meldung[$count + 2], 17));
                $this->SendDebug('SUMMARY', $name, 0);
                $this->SendDebug('START', $start, 0);
                $this->SendDebug('END', $ende, 0);
                $jetzt = date("Ymd") . "\n";
                if (($jetzt >= $start) and ( $jetzt <= $ende))
                {
                    $ferien = explode(' ', $name)[0];
                    $this->SendDebug('FOUND', $ferien, 0);
                }
            }
        }
        return $ferien;
    }

    /**
     * Setzt eine Boolean-Variable
     * 
     * @param string $Ident Der Ident der Boolean-Variable
     * @param bool $value Der neue Wert der Boolean-Variable
     */
    private function SetValueBoolean(string $Ident, bool $value)
    {
        $id = $this->GetIDForIdent($Ident);
        SetValueBoolean($id, $value);
    }

    /**
     * Setzt eine String-Variable
     * 
     * @param string $Ident Der Ident der String-Variable
     * @param string $value Der neue Wert der String-Variable
     */
    private function SetValueString(string $Ident, string $value)
    {
        $id = $this->GetIDForIdent($Ident);
        SetValueString($id, $value);
    }

}

/** @} */