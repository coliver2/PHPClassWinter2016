<form action="#" method="get">
    <fieldset>
        <legend>View/Sort</legend>
        
    <label>Sort</label>  
        <input type="radio" name="sort" value="sort1" />Ascending
        <input type="radio" name="sort" value="sort2" />Descending
        <input type="hidden" name="action" value="sort" />
<br/>
        <label>By Column</label>  
        <select name="column2">
            <option value="id">ID</option>
            <option value="corpname">Corporation Name</option>
            <option value="incdate">Inc. Date</option>
            <option value="email">E-Mail</option>
            <option value="zipcode">Zipcode</option>
            <option value="owner">Owner</option>
            <option value="phone">Phone</option>
        </select>
        
        <input type="submit" value="Submit" />
        <button type="reset" value="reset" />Reset</button>
    </fieldset>    
</form>