<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div id="frame">
    <div id="buttons">
        <button id="button1">View all</button>
        <button id="button2">Search</button>
        <button id="button3">Add</button>
    </div>
    <div class="content" id="content">
        <div class="content1" id="content1">
            <div class="showAllResult" id="showAllResult">

            </div>
        </div>
        <div class="content2" id="content2">
            <form class="form" id="searchForm" >
                <h2>Search by name</h2>
                <input type="text" name="search" id="search">
                <input class="form__submit" type="submit" value="Find">
            </form>
            <div class="result" id="searchResult"></div>
        </div>
        <div class="content3" id="content3">
            <form class="form" id="addForm" >
                <h2>Add product</h2>
                <input type="text" required name="id" id="addId" placeholder="id">
                <input type="text" name="name" id="addName" placeholder="Name">
                <input type="text" name="stock" id="addStock" placeholder="Number in stock">
                <input class="form__submit" type="submit" value="Add">
            </form>
            <div class="result" id="addResult"></div>
        </div>
    </div>
</div>
<script src="main.js"></script>
</body>
</html>