<form action="#" method="get">
    <fieldset>
        <legend>Search</legend>
        
        <label>By column</label>
<select name="column">
            <option value="id">ID</option>
            <option value="corpname">Corporation Name</option>
            <option value="incdate">Inc. Date</option>
            <option value="email">E-Mail</option>
            <option value="zipcode">Zipcode</option>
            <option value="owner">Owner</option>
            <option value="phone">Phone</option>
        </select>
        
        <br/>
        
        <label>Keyword</label>       
        
        <input type="text" name="search">
        <input type="submit" value="Submit">
        <input type="hidden" name="action" value="search">            
            
        </select>
    </fieldset>
</form>
