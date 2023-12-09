function saveToFile() {
    // Get the values from the contact form
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    // Combine the data into a string
    var textContent = "Name: " + name + "\nEmail: " + email + "\nMessage: " + message;

    // Create a Blob with the content
    var blob = new Blob([textContent], { type: "text/plain" });

    // Create a link element
    var a = document.createElement("a");

    // Set the href attribute with the object URL of the blob
    a.href = window.URL.createObjectURL(blob);

    // Set the download attribute with the desired file name
    a.download = "contact_data.txt";

    // Append the link to the document
    document.body.appendChild(a);

    // Trigger a click on the link to start the download
    a.click();

    // Remove the link from the document
    document.body.removeChild(a);
}

function submitForm() {
    // You can add your form submission logic here
    // For now, let's just call the saveToFile function
    saveToFile();
}