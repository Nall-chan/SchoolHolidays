[![SDK](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Version](https://img.shields.io/badge/Modul%20Version-3.02-blue.svg)]()
[Version](https://img.shields.io/badge/Symcon%20Version-7.0%20%3E-green.svg)  
[![License](https://img.shields.io/badge/License-CC%20BY--NC--SA%204.0-green.svg)](https://creativecommons.org/licenses/by-nc-sa/4.0/)
[![Check Style](https://github.com/Nall-chan/SchoolHolidays/workflows/Check%20Style/badge.svg)](https://github.com/Nall-chan/SchoolHolidays/actions) [![Run Tests](https://github.com/Nall-chan/SchoolHolidays/workflows/Run%20Tests/badge.svg)](https://github.com/Nall-chan/SchoolHolidays/actions)  
[![Spenden](https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donate_SM.gif)](#6-spenden)  

# Schulferien <!-- omit in toc -->  

Dieses Modul zeigt an, ob es sich heute um einen Ferientag handelt.
Im Konfigurationsformular muss das Bundesland ausgewählt werden.
Es handelt sich hier um eine Umsetzung von dem Schulferien-Script von kronos aus dem IP-Symcon-Forum.  
[IP-Symcon Forum: Schulferien](https://www.symcon.de/forum/threads/20398-Schulferien)  

## Dokumentation <!-- omit in toc -->

**Inhaltsverzeichnis**

- [1. Funktionsumfang](#1-funktionsumfang)
- [2. Voraussetzungen](#2-voraussetzungen)
- [3. Installation](#3-installation)
- [4. Funktionsreferenz](#4-funktionsreferenz)
- [5. Changelog](#5-changelog)
- [6. Spenden](#6-spenden)
- [7. Lizenz](#7-lizenz)
  
## 1. Funktionsumfang

 Über die Webseite [http://www.schulferien.eu](http://www.schulferien.eu) wird ermittelt ob heute Schulferien sind.  
 Entsprechend werden die beiden Statusvariablen mit Werten gefüllt.  

## 2. Voraussetzungen

 - IPS 5.1 >
 
## 3. Installation

   Über den 'Module-Store' in IPS das Modul `Schulferien` hinzufügen.  

   Unter Instanz hinzufügen ist das Modul 'Schulferien' unter dem Hersteller (Kern) zu finden.  
   Anschließend ist noch das gewünschte Bundesland auszuwählen.  

## 4. Funktionsreferenz

```php
SCHOOL_Update( integer $InstanceID );
```
 Startet eine neue Prüfung ob Ferien sind.  

## 5. Changelog

Version 3.02:  
  - Version für IPS 7.0.  

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

## 6. Spenden

<a href="https://www.paypal.com/donate?hosted_button_id=G2SLW2MEMQZH2" target="_blank"><img src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donate_LG.gif" border="0" /></a>

[![Wunschliste](https://img.shields.io/badge/Wunschliste-Amazon-ff69fb.svg)](https://www.amazon.de/hz/wishlist/ls/YU4AI9AQT9F?ref_=wl_share)


**Danksagung:**  
 An kronos aus dem IPS-Forum für das Original-Script.  
[IP-Symcon Forum: Schulferien](https://www.symcon.de/forum/threads/20398-Schulferien)

## 7. Lizenz

  [CC BY-NC-SA 4.0](https://creativecommons.org/licenses/by-nc-sa/4.0/)  
