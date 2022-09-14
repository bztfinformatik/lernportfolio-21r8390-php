$(document).ready(function () {
	function fetch_data() {
		$.ajax({
			url: "api/api.php?names",
			success: function (data) {
				generateTableFromJSON(data);
				$("tbody").html(generateTableFromJSON(data));
			},
		});
	}

	function add_data() {
		let name = $("#name").val().trim();

		$.ajax({
			url: "api/api.php?add=" + name,
			success: function () {
				console.log("Der Name " + name + " wurde hinzugefügt.");
			},
		});
		fetch_data();
	}

	function generateTableFromJSON(data) {
		let tblData = "";

		for (let key in data) {
			if (!key.includes("response")) {
				tblData += "<tr>";
				tblData += "<td>" + key + "</td>";
				tblData += "<td>" + data[key] + "</td>";
				tblData += "</tr>";
			}
		}

		return tblData;
	}

	$("#show_button").click(function () {
		fetch_data();
	});
	$("#add_button").click(function () {
		add_data();
	});
});
