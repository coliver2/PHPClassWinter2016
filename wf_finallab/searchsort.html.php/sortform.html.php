<form action="#" method="GET">
    <fieldset>
        <legend>View/Sort</legend>
        
           
     
   
    <label>Sort</label>  
        <input type="radio" name="sort" value="asc" />Ascending
        
                
        <input type="radio" name="sort" value="desc" />Descending
        
        
        
<br/>


        <label>By Column</label>  
        <select name="column2">
            <option value="fullname">Name</option>
            <option value="email">E-Mail</option>
            <option value="address">Address</option>
            <option value="phone">Phone</option>
            <option value="website">Web Site</option>
            <option value="birthday">Birthday</option>
        </select>
        
        <input type="submit" value="Submit" />
        <button type="reset" value="reset" />Reset</button>
        <input type="hidden" name="action" value="sort" />
        
    </fieldset>    
</form>