<section id="event-container">
    <form id="create-event-form">
        <div id="inputs">
            <div id='dd'>
                <h5>Event Register</h5>
            </div>
            <label for="c1">Year</label>
            <input type="number" name="year" id="c1" min="2023" max="<?=date('Y')?>" value="<?=date('Y')?>">
            <label for="c2">Month</label>
            <input type="date" name="date" id="c2">
            <input type="text" name="logged_user" value="<?=$loggedUser?>" hidden>
            <input type="submit" value="Register">
        </div>
    </form>
    <div class='alert-message'></div>
</section>
<!-- <section id="event-container">
    <div id="card">
        <div card="card-header">
            <h5>Event Register</h5>
        </div>
        <div id="card-body">
            <form id="create-event-form">
                <div id="inputs">
                    <label for="c1">Year</label>
                    <input type="number" name="year" id="c1" min="2023" max="<?=date('Y')?>" value="<?=date('Y')?>">
                    <label for="c2">Month</label>
                    <input type="date" name="date" id="c2" min="1" max="12" value='1'>
                    <input type="text" name="logged_user" value="<?=$loggedUser?>" hidden>
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
    <div class='alert-message'></div>
</section> -->
<section id="event-table-container">
    <h1 id="tt">List of events</h1>
    <table border="1" id="events-table">
    </table>
</section>