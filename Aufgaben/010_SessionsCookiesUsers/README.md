# 200_FS_FunktAnforderungen

Dieses Projekt ist ein Beispiel für die Umsetzung der funktionalen Anforderungen - Einschränkungen:

- Kein DB-Backend
- Kein Session/Cookies
- Keine Authorisierung
- Kein Access-Control
- Models werden einfach für Fake-Daten missbraucht

## Zielsetzung

> Einfache Menü-Bestellungen in Mensa

> Achtung: In diesem Projekt wurde die Registierung noch nicht beachtet - damit allerdings das Formular zur Bestellung "etwas her macht", wurden da die Benutzerdaten redundant genutzt

## Entities / Models

User:
:   User für Login / mit Rollen (mit JSON-Format)

Menue:
:   Menues, damit etwas bei der Bestellung zur Auswahl steht

Order:
:   Die Bestellung an sich

## Controllers

OrderController:
:   Controller damit Benutzer Bestellungen platzieren können

OrderAdminController:
:   Controller damit der Admin (Menübetreiber) die Bestellungen listen kann

UserController:
:   Register/Login/Listing Controller für User

## Views

UserController:
:   Login/Register/Index

OrderController:
:   Index/PlaceOrder (Hier käme noch das Listing der Bestellungen rein, wenn der Login mal gemacht ist)

OrderAdminController:
:   Index/ListOrders

