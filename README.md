[![Version](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Version](https://img.shields.io/badge/Modul%20Version-3.01-blue.svg)]()
[![Version](https://img.shields.io/badge/License-CC%20BY--NC--SA%204.0-green.svg)](https://creativecommons.org/licenses/by-nc-sa/4.0/)  
[![Version](https://img.shields.io/badge/Symcon%20Version-5.0%20%3E-green.svg)](https://www.symcon.de/forum/threads/30857-IP-Symcon-5-0-%28Stable%29-Changelog)
[![StyleCI](https://styleci.io/repos/41354661/shield?style=flat)](https://styleci.io/repos/41354661)  

# Schulferien

Dieses Modul zeigt an, ob es sich heute um einen Ferientag handelt.
Im Konfigurationsformular muss das Bundesland ausgewählt werden.
Es handelt sich hier um eine Umsetzung von dem Schulferien-Script von kronos aus dem IP-Symcon-Forum.  
[IP-Symcon Forum: Schulferien](https://www.symcon.de/forum/threads/20398-Schulferien)  

## Dokumentation

**Inhaltsverzeichnis**

1. [Funktionsumfang](#1-funktionsumfang) 
2. [Voraussetzungen](#2-voraussetzungen)
3. [Installation](#3-installation)
4. [Funktionsreferenz](#4-funktionsreferenz) 
5. [Anhang](#5-anhang)
6. [Lizenz](#6-lizenz)

## 1. Funktionsumfang

 Über die Webseite [http://www.schulferien.eu](http://www.schulferien.eu) wird ermittelt ob heute Schulferien sind.  
 Entsprechend werden die beiden Statusvariablen mit Werten gefüllt.  

## 2. Voraussetzungen

 - IPS 5.0 >
 
## 3. Installation

### IPS 3.x  
   Kein Modul, aber das Original-Script aus dem Forum kann genutzt werden.
    [IP-Symcon Forum: Schulferien](https://www.symcon.de/forum/threads/20398-Schulferien)

### ab IPS 5.0  
   Über das 'Modul Control' folgende URL hinzufügen:  
    `git://github.com/Nall-chan/IPSSchoolHolidays.git`  

   Unter Instanz hinzufügen ist das Modul 'Schulferien' unter dem Hersteller (Kern) zu finden.  
   Anschließend ist noch das gewünschte Bundesland auszuwählen.  

## 4. Funktionsreferenz

```php
SCHOOL_Update( integer $InstanceID );
```
 Startet eine neue Prüfung ob Ferien sind.  

## 5. Anhang

**GUID's:**  
 `{3B2628A3-AA47-431F-BF65-074C7002174B}`

**Changelog:** 

Version 3.01:  
  - BugFix für die 'Sind Ferien ?' Variable.

Version 3.0:  
  - Update für IPS 5  

 Version 2.01:  
  - Fix: Timer in Create verschoben
 
 Version 2.00:  
  - Anbieterwechsel auf schulferien.eu (Einstellung Bundesland muss neu übernommen werden!)
 
 Version 1.01:  
  - Update Doku

 Version 1.0:  
  - Erstes Release  

**Danksagung:**  
 An kronos aus dem IPS-Forum für das Original-Script.  
[IP-Symcon Forum: Schulferien](https://www.symcon.de/forum/threads/20398-Schulferien)

## 6. Lizenz

  [CC BY-NC-SA 4.0](https://creativecommons.org/licenses/by-nc-sa/4.0/)  
