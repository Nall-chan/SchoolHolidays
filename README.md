[![SDK](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Module Version](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2FNall-chan%2FSchoolHolidays%2Frefs%2Fheads%2Fmaster%2Flibrary.json&query=%24.version&label=Modul%20Version&color=blue)](https://community.symcon.de/t/schulferien/30423)
[![Symcon Version](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2FNall-chan%2FSchoolHolidays%2Frefs%2Fheads%2Fmaster%2Flibrary.json&query=%24.compatibility.version&suffix=%3E&label=Symcon%20Version&color=green)](https://www.symcon.de/de/service/dokumentation/installation/migrationen/v80-v81-q3-2025/)  
[![License](https://img.shields.io/badge/License-CC%20BY--NC--SA%204.0-green.svg)](https://creativecommons.org/licenses/by-nc-sa/4.0/)
[![Check Style](https://github.com/Nall-chan/SchoolHolidays/workflows/Check%20Style/badge.svg)](https://github.com/Nall-chan/SchoolHolidays/actions) [![Run Tests](https://github.com/Nall-chan/SchoolHolidays/workflows/Run%20Tests/badge.svg)](https://github.com/Nall-chan/SchoolHolidays/actions)  
[![PayPal.Me](https://img.shields.io/badge/PayPal-Me-lightblue.svg)](#6-spenden)[![Wunschliste](https://img.shields.io/badge/Wunschliste-Amazon-ff69fb.svg)](#6-spenden)  

# Schulferien <!-- omit in toc -->  

Dieses Modul zeigt an, ob es sich heute um einen Ferientag handelt.
Im Konfigurationsformular muss das Bundesland ausgewählt werden.
Es handelt sich hier um eine Umsetzung von dem Schulferien-Script von kronos aus dem IP-Symcon-Forum.  
[IP-Symcon Forum: Schulferien](https://www.symcon.de/forum/threads/20398-Schulferien)  

## Inhaltsverzeichnis <!-- omit in toc -->

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

- IP-Symcon ab Version 8.1

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

**Version 3.02:**  

- Version für Symcon 8.1  

**Version 3.01:**  

- BugFix für die 'Sind Ferien ?' Variable  

**Version 3.0:**  

- Update für Symcon 5  

**Version 2.01:**  

- Fix: Timer in Create verschoben

**Version 2.00:**  

- Anbieterwechsel auf schulferien.eu (Einstellung Bundesland muss neu übernommen werden!)

**Version 1.01:**  

- Update Doku

**Version 1.0:**  

- Erstes Release  

## 6. Spenden

[![PayPal.Me](https://img.shields.io/badge/PayPal-Me-lightblue.svg)](https://paypal.me/Nall4chan)  

[![Wunschliste](https://img.shields.io/badge/Wunschliste-Amazon-ff69fb.svg)](https://www.amazon.de/hz/wishlist/ls/YU4AI9AQT9F?ref_=wl_share)

**Danksagung:**  
 An kronos aus dem IPS-Forum für das Original-Script.  
[IP-Symcon Forum: Schulferien](https://www.symcon.de/forum/threads/20398-Schulferien)

## 7. Lizenz

[CC BY-NC-SA 4.0](https://creativecommons.org/licenses/by-nc-sa/4.0/)  
