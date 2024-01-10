<div class="window">
    <div class="box-container_add_form">
        <h2>New/Edit</h2>
        <form action="" method="post">

            <div>
              <label for="type">Type:</label>
              <select id="type" name="type">
                 <option value="Devices">Devices</option>
                 <option value="Sensors">Sensors</option>
              </select>
          </div>

          <div>
             <label for="section">Section:</label>
             <select id="section" name="section">
                   <option value="section1">Section 1</option>
                   <option value="section2">Section 2</option>
                 <option value="section3">Section 3</option>
               </select>
          </div>

            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </div>

            <div>
                <button type="button" class="cancel" onclick="cancel()">Cancel</button>
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
</div>














