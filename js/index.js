document.getElementById('category_filter').onchange = function() {
    window.location = "index.php?category=" + this.value;
};
