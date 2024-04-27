function shortenUrl(){
    console.log("shortening...")
    let originalUrl = document.getElementById('originalUrl').value
    let xhr = new XMLHttpRequest()

    xhr.open('POST', "../ajax_handler.php", true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    xhr.onreadystatechange = function (){
        if (xhr.readyState === 4 && xhr.status === 200){
            console.log("ok")
            document.getElementById('resultContainer').innerText = JSON.parse(xhr.responseText);
        }
    }
    let data = 'action=shorten&originalUrl=' + encodeURIComponent(originalUrl)
    xhr.send(data)
}