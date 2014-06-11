
<div id="main">
    <h1> Adicionar livros</h1>
<br>
<br>
    <h2>Adicionar 1 livro</h2>
    <br>
<form action="useraccount/addbooks" method="post">
    ISBN: <input type="text"  name="isbn_1_book" /><br />
    <input type="hidden" value="1" name="add_1_book_flag"/>
    <input type="submit"  value="Enviar" name="" />
</form>
    <br>
    
    <h2>Adicionar vários livros (arquivos xls, xlsx, cvs)</h2>
<br>
<br>
    
    <form action="useraccount/addbooks" method="post"
enctype="multipart/form-data">
<label for="file">Arquivo:</label>
<input type="file" name="file" id="file"><br>
<input type="hidden" value="1" name="add_multiple_books_flag"/>
<input type="submit" name="submit" value="Enviar">
</form>
<br>
<br>
    
    Template xls
    Template xlsx
    Template cvs
 </div>