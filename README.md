# Komfortkasse-Plugin für modified eCommerce

Das Komfortkasse-Plugin für modified eCommerce (früher xtcModified) automatisiert den Zahlungsabgleich für **Vorkasse, Rechnung und Nachnahme**. Komfortkasse ordnet eingehende Überweisungen automatisch den offenen Bestellungen Ihres Shops zu und setzt den Bestellstatus, sobald das Geld da ist. Das Plugin verbindet den modified-Shop mit Komfortkasse; den Abgleich mit dem Bankkonto übernimmt Komfortkasse.

[Komfortkasse für modified](https://komfortkasse.eu/shopsysteme/modified/) · [Kostenlos registrieren](https://ssl.komfortkasse.eu/public/register.jsf) · [Installationsanleitung](https://komfortkasse.freshdesk.com/support/solutions/articles/14000161599) · [Hilfe & Dokumentation](https://komfortkasse.freshdesk.com/support/solutions/14000075022)

## Eckdaten

| Merkmal | Angabe |
|---|---|
| Shopsystem | [modified eCommerce Shopsoftware](https://www.modified-shop.org/) (früher xtcModified) |
| Unterstützte Versionen | modified eCommerce 1.06 und ab 2.0 |
| Zahlungsarten | Vorkasse (Vorauskasse, Banküberweisung), Rechnung (Kauf auf Rechnung), Nachnahme |
| Aufgabe des Plugins | Überträgt offene Bestellungen an Komfortkasse und setzt den Bestellstatus bei Zahlungseingang oder Storno |
| Für wen | Betreiber von modified-Shops und Agenturen, die solche Shops betreuen |
| Kosten | Das Plugin ist kostenlos. Für Komfortkasse gelten die [Preise](https://komfortkasse.eu/preise/) auf komfortkasse.eu. |
| Anbieter | LTC Information Services GmbH, [komfortkasse.eu](https://komfortkasse.eu/) |

## Was ist Komfortkasse?

Komfortkasse ist ein Online-Dienst der LTC Information Services GmbH, der Zahlungen per Banküberweisung für Onlineshops automatisiert. Komfortkasse ruft die Zahlungseingänge vom Bankkonto ab, ordnet sie den offenen Bestellungen zu und meldet den Zahlungsstatus an den Shop zurück. Der Dienst richtet sich an Online-Händler in Deutschland, Österreich und der Schweiz.

Komfortkasse unterstützt die Zahlungsarten, bei denen das Geld per Überweisung kommt:

- [Vorkasse](https://komfortkasse.eu/loesungen/vorkasse/): Der Käufer überweist vor dem Versand. Komfortkasse prüft den Zahlungseingang und setzt den Bestellstatus im Shop automatisch.
- [Rechnung](https://komfortkasse.eu/loesungen/rechnung/): Die Ware wird sofort geliefert, der Käufer überweist danach. Komfortkasse überwacht die Zahlung und sendet bei Bedarf Zahlungserinnerungen und Mahnungen.
- [Nachnahme](https://komfortkasse.eu/loesungen/nachnahme/): Der Versanddienstleister kassiert bei der Zustellung und überweist den Betrag. Komfortkasse überwacht diese Überweisung.

### So funktioniert Komfortkasse mit modified

1. Das Komfortkasse-Plugin überträgt die offenen Bestellungen aus modified an Ihren Komfortkasse-Account.
2. Komfortkasse ist mit Ihrem Bankkonto verbunden ([unterstützte Banken](https://komfortkasse.eu/banken/)) und ordnet eingehende Zahlungen den Bestellungen zu.
3. Das Plugin setzt die Bestellung in modified auf den gewählten Status, z. B. „Zahlung eingegangen“, oder auf „storniert“, wenn keine Zahlung kommt.

Komfortkasse versendet außerdem Zahlungserinnerungen an Käufer, behandelt Teil- und Überzahlungen und wickelt Rückerstattungen ab. Alle Funktionen sind auf [komfortkasse.eu](https://komfortkasse.eu/) beschrieben.

## Funktionen des Komfortkasse-Plugins für modified

- **Bestellungen übertragen:** Das Plugin exportiert offene Bestellungen nach Zahlungsart (Vorkasse, Rechnung, Nachnahme) und Bestellstatus. Welche Bestellungen dazugehören, legen Sie über Zahlungsart-Codes und Status-Codes in den Einstellungen fest.
- **Bestellstatus setzen:** Bei Zahlungseingang und bei Storno bzw. ausbleibender Zahlung ändert das Plugin den Bestellstatus automatisch. Die Status sind je Zahlungsart frei wählbar.
- **Vorhandene Zahlungsmodule nutzen:** Das Plugin arbeitet mit den Zahlungsmodulen des Shops, z. B. `moneyorder`, `eustandardtransfer`, `invoice` und `cod`. Es fügt im Checkout keine eigene Zahlungsart hinzu.
- **Verschlüsselte Übertragung:** Das Plugin überträgt die Daten verschlüsselt, bevorzugt mit OpenSSL. Die Schlüssel setzt Komfortkasse beim Verbinden des Shops automatisch.
- **Echtzeit-Übertragung (optional):** Komfortkasse liest neue Bestellungen regelmäßig aus dem Shop aus. Mit der Echtzeit-Übertragung meldet das Plugin jede neue Bestellung sofort, sodass der Käufer die Zahlungsinformationen ohne Wartezeit erhält.

## Voraussetzungen

- modified eCommerce 1.06 oder ab Version 2.0
- Ein Komfortkasse-Account ([kostenlos registrieren](https://ssl.komfortkasse.eu/public/register.jsf))
- Ein Bankkonto, das Sie mit Komfortkasse verbinden ([unterstützte Banken](https://komfortkasse.eu/banken/)), oder ein integriertes Bankkonto von Komfortkasse
- Empfohlen: PHP mit OpenSSL-Erweiterung, für die Verschlüsselung und für die Echtzeit-Übertragung per HTTPS

## Installation in modified eCommerce

Die Installation besteht aus vier Schritten: Dateien kopieren, Installer aufrufen, Einstellungen prüfen und den Shop mit dem Komfortkasse-Account verbinden.

1. **Dateien kopieren:** [Aktuelle Version als ZIP herunterladen](https://github.com/ltckomfortkasse/komfortkasse-modified/archive/master.zip) und den Ordner `callback/komfortkasse` in den Ordner `callback` Ihres Shops kopieren. Ergebnis: `/callback/komfortkasse`.
2. **Installer aufrufen:** Im Browser `https://<ihr-shop>/callback/komfortkasse/install.php` öffnen. Der Installer prüft zwei Ergänzungen und bricht mit einem Hinweis ab, solange eine davon fehlt:
   - die Komfortkasse-Zeilen in der Sprachdatei `lang/<sprache>/admin/configuration.php` (Vorlage: `callback/komfortkasse/lang/<sprache>/configuration.php`)
   - den Menüeintrag in `admin/includes/column_left.php` (die genaue Zeile zeigt der Installer an)

   Nach jeder Ergänzung den Installer erneut aufrufen. Sind beide vorhanden, legt er die Einstellungen an.
3. **Einstellungen prüfen:** Im Admin-Bereich die Komfortkasse-Einstellungen öffnen (Link im Installer). „Export Bestellungen“ und „Update Bestellungen“ müssen aktiv sein. Die Zahlungsart-Codes eintragen (z. B. `moneyorder`, `eustandardtransfer`, `invoice`, `cod`) und je Zahlungsart die Bestellstatus wählen.
4. **Shop verbinden:** Den Shop in Ihrem Komfortkasse-Account verbinden. Verschlüsselung, Zugriffscode und Schlüssel werden dabei automatisch gesetzt und dürfen nicht geändert werden.

Nach der Installation sperrt der Installer `install.php` per `.htaccess`. Gelingt das nicht, weist er darauf hin; benennen Sie `install.php` dann um.

Ausführliche Anleitung mit Screenshots: [Installationsanleitung](https://komfortkasse.freshdesk.com/support/solutions/articles/14000161599) (gilt für xt:Commerce 3 und modified).

### Echtzeit-Übertragung aktivieren (optional)

Ohne weitere Einrichtung liest Komfortkasse neue Bestellungen regelmäßig aus dem Shop aus. Für die Übertragung in Echtzeit kommt ein kurzer Code-Block an zwei Stellen hinzu: in `admin/orders.php` (in neueren modified-Versionen `admin/includes/modules/orders_update.php`) und im verwendeten Zahlungsmodul, z. B. `includes/modules/payment/eustandardtransfer.php`. Den Code zeigt der Installer nach dem letzten Schritt an; er steht auch in der Installationsanleitung.

## Update

Für ein Update kopieren Sie die neue Version über die bestehende und rufen den Installer erneut auf.

1. Ordner `/callback/komfortkasse` und Datenbank sichern.
2. Neue Version darüber kopieren.
3. `install.php` erneut aufrufen. Der Installer erkennt die bestehende Installation und aktualisiert sie.

Meldet der Installer fehlende Sprachzeilen, ersetzen Sie die Komfortkasse-Zeilen in `lang/<sprache>/admin/configuration.php` durch den Inhalt von `callback/komfortkasse/lang/<sprache>/configuration.php`.

## Häufige Fragen

### Was kostet das Komfortkasse-Plugin für modified?

Das Plugin ist kostenlos. Für Komfortkasse selbst fällt eine prozentuale Gebühr pro Zahlungseingang an, ohne Grundgebühr und ohne Einrichtungsgebühr. Die aktuellen Sätze stehen auf der [Preisseite](https://komfortkasse.eu/preise/). Neue Accounts können Komfortkasse kostenlos testen.

### Ist das Komfortkasse-Plugin ein Zahlungsmodul?

Nein. Das Komfortkasse-Plugin fügt im Checkout keine Zahlungsart hinzu. Es arbeitet mit den Zahlungsmodulen, die der modified-Shop bereits nutzt, zum Beispiel `moneyorder` oder `eustandardtransfer` für Vorkasse, `invoice` für Rechnung und `cod` für Nachnahme. Welche Zahlungsart-Codes das Plugin berücksichtigt, legen Sie in den Einstellungen fest.

### Was passiert, wenn die Bestellnummer fehlt oder der Betrag abweicht?

Komfortkasse ordnet Zahlungen fehlertolerant zu. Die Zuordnung funktioniert auch, wenn die Bestellnummer im Verwendungszweck fehlt, der Name des Zahlers nicht zum Besteller passt oder der Betrag abweicht. Auch Teil- und Überzahlungen behandelt Komfortkasse.

### Was passiert, wenn ein Käufer nicht zahlt?

Komfortkasse sendet automatisch Zahlungserinnerungen an den Käufer. Bleibt die Zahlung aus, setzt das Plugin die Bestellung in modified auf den Status, den Sie dafür gewählt haben. Die Einstellungen unterscheiden nach Zahlungsart: „storniert“ bei Vorkasse, „keine Zahlung/Inkasso“ bei Rechnung und „Zahlung ungeklärt“ bei Nachnahme.

### Welche Banken unterstützt Komfortkasse?

Komfortkasse arbeitet mit Ihrem eigenen Bankkonto oder mit einem integrierten Bankkonto von Komfortkasse. Welche Banken sich anbinden lassen, zeigt die Liste der [unterstützten Banken](https://komfortkasse.eu/banken/).

### Müssen für das Plugin Dateien des Shops geändert werden?

Ja, an zwei Stellen: Die Komfortkasse-Zeilen kommen in die Sprachdatei `lang/<sprache>/admin/configuration.php`, der Menüeintrag in `admin/includes/column_left.php`. Alle übrigen Dateien liegen im eigenen Ordner `/callback/komfortkasse`. Nur die optionale Echtzeit-Übertragung braucht zwei weitere kurze Ergänzungen (siehe Installation).

### Gibt es Komfortkasse auch für andere Shopsysteme?

Ja. Komfortkasse gibt es unter anderem für Shopify, Shopware, WooCommerce, PrestaShop, Gambio und xt:Commerce. Alle Systeme stehen in der [Übersicht der Shopsysteme](https://komfortkasse.eu/shopsysteme/), weitere Plugin-Repositories unter [github.com/ltckomfortkasse](https://github.com/ltckomfortkasse).

## Support

Fragen zur Einrichtung beantworten die [Hilfe-Seiten](https://komfortkasse.freshdesk.com/support/solutions/14000075022) und der [Komfortkasse-Support](https://komfortkasse.eu/kontakt/).

## English

**Komfortkasse plugin for modified eCommerce (formerly xtcModified).** Komfortkasse automatically matches incoming bank transfers to open orders in your shop and updates the order status as soon as the payment has arrived. It supports prepayment by bank transfer (Vorkasse), invoice and cash on delivery. Komfortkasse is a service of LTC Information Services GmbH for online merchants in Germany, Austria and Switzerland.

The plugin supports modified eCommerce 1.06 and 2.0 or later. It does not add a payment method to the checkout; it works with the shop's existing payment modules (e.g. `moneyorder`, `eustandardtransfer`, `invoice`, `cod`). The plugin is free of charge; Komfortkasse itself is a paid service ([pricing](https://komfortkasse.eu/preise/)).

Installation: copy `callback/komfortkasse` into your shop's `callback` folder, open `https://<your-shop>/callback/komfortkasse/install.php` and follow the instructions, then connect the shop in your Komfortkasse account. More information: [Komfortkasse for modified](https://komfortkasse.eu/shopsysteme/modified/) · [Installation guide (English)](https://komfortkasse.freshdesk.com/support/solutions/articles/14000161606)
