<section id="expen-container">
    <form id="create-expen-form">
        <div id='dd'>
            <h5>Expense Register</h5>
        </div>
        <label for="c1">Expense Type</label>
        <select name="expense_type" id="c1">
            <option value="">Select an expense</option>
        </select>
        <label for="c3">Value</label>
        <input type="text" name="value" placeholder="Write a value" id="c3" >
        <input type="text" name="event_number" value="<?=$_GET['event_number']?>" hidden>
        <!-- <input type="text" name="logged_user" value="<?=$loggedUser?>" hidden> -->
        <input type="submit" value="Register">
    </form>
    <div class='alert-message'></div>
</section>
<p id="event_number" hidden><?=$_GET['event_number']?></p>
<section id="expen-table-container">
    <h1 id="tt">Expenses list of Event #<?=$_GET['event_number']?> </h1>
    <table border="1" id="expens-table">
    </table>
</section>