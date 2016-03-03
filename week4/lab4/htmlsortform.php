<form action="#" method="GET">
    <fieldset>
        <legend>View/Sort</legend>
        
           
     
   
    <label>Sort</label>  
        <input type="radio" name="sort" value="asc" />Ascending
        
                
        <input type="radio" name="sort" value="desc" />Descending
        
        
        
<br/>


        <label>By Column</label>  
        <select name="column2">
            <option value="id">ID</option>
            <option value="corp">Corporation Name</option>
            <option value="incorp_dt">Inc. Date</option>
            <option value="email">E-Mail</option>
            <option value="zipcode">Zipcode</option>
            <option value="owner">Owner</option>
            <option value="phone">Phone</option>
        </select>
        
        <input type="submit" value="Submit" />
        <button type="reset" value="reset" />Reset</button>
        <input type="hidden" name="action" value="sort" />
        
    </fieldset>    
</form>