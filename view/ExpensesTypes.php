<section id="container">
    <form id="create-expense-form">
        <div id='dd'>
            <h5>Expense Type Register</h5>
        </div>
        <input type="text" name="name" placeholder="Write an expense type" id="name">
        <input type="text" name="logged_user" value="<?=$loggedUser?>" hidden>
        <input type="submit" value="Register">
    </form>
    <div class='alert-message'></div>
</section>
<section id="table-container">
    <h1 id="tt">List of expenses types</h1>
    <table border="1" id="expenses-types-table">
    </table>
</section>