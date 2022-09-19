window.onload = doSearch();

function doSearch() {
	// (A1) SUCHTEXT AUSLESEN
	let form = document.getElementById("mySearch");

	// (A2) AJAX - ANFRAGE
	fetch("../Controller/controller.php", {
		method: "POST",
		body: new FormData(form),
	})
		.then((res) => res.json())
		.then((res) => {
			let results = document.getElementById("results");
			results.innerHTML = "";
			if (res !== null) {
				for (let r of res) {
					results.innerHTML += `<tr><td scope="row">${r.id}</td><td>${r.name}</td></tr>`;
				}
			}
		});
	return false;
}
