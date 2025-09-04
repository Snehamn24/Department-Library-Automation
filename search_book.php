<!-- Search Box -->
<div class="container mt-3">
    <h5>Search Books:</h5>
    <input type="text" id="searchInput" class="form-control" placeholder="Type book name..." onkeyup="searchBooks()">
    
    <!-- Search Results -->
    <ul id="searchResults" class="list-group mt-2"></ul>
</div>

<script>
function searchBooks() {
    var query = document.getElementById("searchInput").value;
    
    if (query.length === 0) {
        document.getElementById("searchResults").innerHTML = "";
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "search_books.php?query=" + query, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("searchResults").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $(document).on("click", ".book-link", function (e) {
        e.preventDefault(); // Prevent default link behavior

        var bookName = $(this).data("name"); // Get book name
        console.log("Clicked Book Name:", bookName); // Debugging Step 1

        if (!bookName) {
            console.log("❌ Error: Book Name is missing!");
            return;
        }

        $.ajax({
            url: "fetch_book_details.php",
            type: "POST",
            data: { book_name: bookName }, // Send book_name instead of book_id
            success: function (response) {
                console.log("AJAX Response:", response); // Debugging Step 2
                $("#bookDetails").html(response);
            },
            error: function (xhr, status, error) {
                console.log("AJAX Error:", error); // Debugging Step 3
            }
        });
    });
});
</script>