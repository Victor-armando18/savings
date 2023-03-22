<section id="income-container">
    <form id="create-income-form">
        <div id='dd'>
            <h5>Income Register</h5>
        </div>
        <label for="c1">Year</label>
        <input type="number" name="year" placeholder="Write a Year" id="c1" min="2023" max="<?=date('Y')?>" value="<?=date('Y')?>">
        <label for="c2">Month</label>
        <input type="number" name="month" placeholder="Write a month" id="c2" min="1" max="12" value='1'>
        <label for="c3">Value</label>
        <input type="text" name="value" placeholder="Write a value" id="c3" value="0,00">
        <input type="text" name="logged_user" value="<?=$loggedUser?>" hidden>
        <input type="submit" value="Register">
    </form>
    <div class='alert-message'></div>
</section>
<section id="incomes-table-container">
    <h1 id="tt">List of incomes</h1>
    <table border="1" id="incomes-table">
    </table>
</section>