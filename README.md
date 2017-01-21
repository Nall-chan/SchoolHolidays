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

 - IPS 4.x
 
## 3. Installation

### IPS 3.x  
   Kein Modul, aber das Original-Script aus dem Forum kann genutzt werden.
    [IP-Symcon Forum: Schulferien](https://www.symcon.de/forum/threads/20398-Schulferien)

### IPS 4.x  
   Über das 'Modul Control' folgende URL hinzufügen:  
    `git://github.com/Nall-chan/IPSSchoolHolidays.git`  

   Unter Instanz hinzufügen ist das Modul 'Schulfreien' unter dem Hersteller (Kern) zu finden.  
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
