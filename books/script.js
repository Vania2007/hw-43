function callServer() {
    document.getElementById("dest").innerHTML = "Виконується обробка файлів...";
    const request = document.getElementById("product").value;
    const url = "search.php?request=" + request;
    fetch(url)
      .then((response) => {
        if (!response.ok) {
          throw new Error(
            "Код помилки" + response.status + " " + response.statusText
          );
        }
        return response.text();
      })
      .then((data) => {
        document.getElementById("dest").innerHTML = data;
      });
  }
  