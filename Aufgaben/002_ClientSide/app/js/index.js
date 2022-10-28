// JQuery - Document ready
$(function () {
	// ----------------------------------------------
	// Beim Starten der Seite alle Daten anzeigen
	// ----------------------------------------------
	getData();
	// ----------------------------------------------
	// Initialisierung vom Modal, Select & Sidenav
	// ----------------------------------------------
	$(".modal").modal();
	$("select").formSelect();
	$(".sidenav").sidenav();
	// ----------------------------------------------
	// Datenbank neu aufsetzen für Testzwecke
	// ----------------------------------------------
	$("#resetDB").click(function () {
		if (
			confirm("Wollen Sie wirklich die Datenbank komplett neu aufsetzen?")
		) {
			$.ajax({
				url: "api/kunde.php?action=resetDB",
				dataType: "json",
				success: function (response) {
					// Wenn error - Meldungen existieren, anzeigen
					if (response["error"].length > 0) {
						console.info("Daten erhalten");
						for (var i = 0; i < response["error"].length; i++) {
							M.toast({
								html: response["error"][i].meldung,
								classes: "rounded red",
							});
						}
					}
					getData();
				},
			});
		}
	});
	// ----------------------------------------------
	// Button hinzufügen eines Kunden
	// ----------------------------------------------
	$("#addKunde").click(() => {
		console.log("addKunde");
		$("#modat_titel").html("Neuer Kunde erfassen");
		var kunde_id = 0;
		loadform(kunde_id);
	});
	// ----------------------------------------------
	// Formular Button abbrechen
	// ----------------------------------------------
	$("#abbrechen").click(function () {
		console.log("Formular abbrechen");
	});
	// ----------------------------------------------
	// Formular Button senden
	// ----------------------------------------------
	$("#speichern").click(function () {
		console.log("Formular speichern");
		// Formulardaten auslesen
		let kunde_firma = $("#kunde_firma").val().trim();
		let kunde_email = $("#kunde_email").val().trim();
		let kunde_kategorie = $("#kunde_kategorie").val().trim();
		let kunde_rechnung = $('input[name="kunde_rechnung"]:checked')
			.val()
			.trim();
		let kunde_kontaktperson = $("#kunde_kontaktperson").val().trim();

		//kunde_id - Feld wird benutz für Update bei insert ist die kunde_id 0
		let kunde_id = $("#kunde_id").val();

		// Validierung der Daten
		let send = true;

		// Längen überprüfen
		if (kunde_firma.length < 3) {
			$("#kunde_firma").addClass("orange lighten-4");
			M.toast({
				html: "Firmenname zu klein, mindestens 3 Zeichen",
				classes: "red black-text",
			});
			send = false;
		} else if (kunde_firma.length > 255) {
			$("#kunde_firma").addClass("orange lighten-4");
			M.toast({
				html: "Firmenname zu lang, maximal 255 Zeichen",
				classes: "red black-text",
			});
			send = false;
		}
		if (kunde_kontaktperson.length < 3) {
			$("#kunde_kontaktperson").addClass("orange lighten-4");
			M.toast({
				html: "Kontaktperson zu klein, mindestens 3 Zeichen",
				classes: "red black-text",
			});
			send = false;
		} else if (kunde_kontaktperson.length > 255) {
			$("#kunde_kontaktperson").addClass("orange lighten-4");
			M.toast({
				html: "Kontaktperson zu lang, maximal 255 Zeichen",
				classes: "red black-text",
			});
			send = false;
		}
		if (kunde_email.length < 10) {
			$("#kunde_email").addClass("orange lighten-4");
			M.toast({
				html: "Email zu kurz, mindestens 10 Zeichen",
				classes: "red black-text",
			});
			send = false;
		} else if (kunde_email.length > 255) {
			$("#kunde_email").addClass("orange lighten-4");
			M.toast({
				html: "Email zu lang, maximal 255 Zeichen",
				classes: "red black-text",
			});
			send = false;
		} else if (!validateEmail(kunde_email)) {
			$("#kunde_email").addClass("orange lighten-4");
			M.toast({
				html: "Falsches Email Format [text@domain.ch]",
				classes: "red black-text",
			});
			send = false;
		}

		// Formular senden wenn alle Überprüfungen korrekt sind
		if (send) {
			var mymodal = M.Modal.getInstance($(".modal"));
			mymodal.close();
			$.ajax({
				url: "api/kunde.php?action=insert&id=" + kunde_id,
				type: "POST",
				dataType: "json",
				data: {
					kunde_firma: kunde_firma,
					kunde_email: kunde_email,
					kunde_kategorie: kunde_kategorie,
					kunde_rechnung: kunde_rechnung,
					kunde_kontaktperson: kunde_kontaktperson,
				},
				success: function (response) {
					console.log(
						"Daten an PHP-Server gesendet und Rückmeldung:" +
							response
					);
					// Wenn error - Meldungen existieren, anzeigen
					if (response["error"].length > 0) {
						console.info("Daten erhalten");
						for (const element of response["error"]) {
							M.toast({
								html: element.meldung,
								classes: "rounded red",
							});
						}
					}
					getData();
				},
			});
		}
	});
	// ----------------------------------------------
	// Email Validieren
	// ----------------------------------------------
	function validateEmail(email) {
		const res =
			/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return res.test(String(email).toLowerCase());
	}
	// ----------------------------------------------
	// Suche in Tabelle
	// ----------------------------------------------
	$("#searchBarText").on("keyup", function () {
		let value = $(this).val().toLowerCase();
		$("#kundenTabelle tbody tr").filter(function () {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
		});
	});
});

// ----------------------------------------------
// Formular laden in das Modal
// ----------------------------------------------
function loadform(kunde_id) {
	$("#modat_inhalt").load("sites/formular.html", function () {
		$("select").formSelect();
		$("#kunde_id").val(kunde_id);
		// wenn kunde_id > 0 dann Felder füllen
		if (kunde_id > 0) {
			$.ajax({
				url: "api/kunde.php?action=getData&id=" + kunde_id,
				dataType: "json",
				success: function (response) {
					console.info(response);
					$("#kunde_firma").val(response["data"][0]["kunde_firma"]);
					$("#kunde_email").val(response["data"][0]["kunde_email"]);
					$("#kunde_kategorie").val(
						response["data"][0]["kunde_kategorie"]
					);
					$("#kunde_kontaktperson").val(
						response["data"][0]["kunde_kontaktperson"]
					);

					// Rechnungsstatus setzen
					let rechnung = response["data"][0]["kunde_rechnung"];
					$(
						"input[name=kunde_rechnung][value='" + rechnung + "']"
					).prop("checked", true);

					// DROP - DOWN wieder initialisieren nach befüllen
					$("select").formSelect();

					// label für input - Felder klasse active hinzufügen
					$(".labelset label").addClass("active");
					M.updateTextFields();
				},
			});
		} else {
			// label für input - Felder klasse active hinzufügen
			$(".labelset label").addClass("active");
			M.updateTextFields();
		}
	});

	// Modal öffnen
	M.Modal.getInstance($(".modal")).open();
}
// ----------------------------------------------
// Holen und Anzeigen der Daten
// ----------------------------------------------
function getData() {
	// leeren der Kundenliste
	$("tbody").html("");
	// template in Variable laden für späteres anzeigen mit Mustache
	let mtpl = $("template").html();
	// JSON laden mittels AJAX
	$.ajax({
		// welche Datei wird aufgerufen
		url: "./api/kunde.php",
		// Rückgabetyp von der url (JSON, HTML, XML usw.)
		dataType: "json",
		success: function (response) {
			// was passiert wenn die Datei erfolgreich aufgerufen wurde
			console.log(response);
			if (response["meldung"]) {
				console.info(response["meldung"]);
			}
			// Wenn error - Meldungen existieren, anzeigen
			if (response["error"].length > 0) {
				console.info("Daten erhalten");
				for (const element of response["error"]) {
					M.toast({
						html: element.meldung,
						classes: "rounded red",
					});
				}
			}
			// Datensätze anzeigen
			if (response["data"].length > 0) {
				for (i = 0; i < response["data"].length; i++) {
					let html = Mustache.to_html(mtpl, response["data"][i]);
					$("tbody").append(html);
				}
			}

			// EVENTS SIND ERST JETZT ZU DEFINIEREN
			// ----------------------------------------------
			// Liste Button löschen eines Kunden
			// ----------------------------------------------
			$(".delete").click(function () {
				let kunde_id = $(this).parent().attr("data-id");
				console.log("delete von : " + kunde_id);
				if (confirm("Wollen Sie den Datensatz wirklich löschen?")) {
					$.ajax({
						url: "api/kunde.php?action=deleteID&id=" + kunde_id,
						dataType: "json",
						success: function (response) {
							// Wenn error - Meldungen existieren, anzeigen
							if (response["error"].length > 0) {
								console.info("Daten erhalten");
								for (const element of response["error"]) {
									M.toast({
										html: element.meldung,
										classes: "rounded red",
									});
								}
							}
							getData();
						},
					});
				}
			});
			// ----------------------------------------------
			// Liste Button editieren eines Kunden
			// ----------------------------------------------
			$(".edit").click(function () {
				let kunde_id = $(this).parent().attr("data-id");
				console.log("edit von : " + kunde_id);
				$("#modat_titel").html("Kunde editieren von : " + kunde_id);
				loadform(kunde_id);
			});
		},
	});
}
