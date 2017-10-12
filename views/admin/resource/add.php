                    <div class="page-option-view">    
                        <p class="main-label-text input-box-label">Resource Type: 
                            <select class="input-box-fill">
								<option value="1">Book</option>
								<option value="2">Media</option>
								<option value="3">Research</option>
								<option value="4">Magazine</option>
								<option value="5">Newspaper</option>
								<option value="6">Journal</option>
							</select>
                        </p>
                        <hr>
                        <?php echo form_open_multipart('admin/resdata/createBook') ?>
                            <table>
                                <tr>
                                    <td class="input-box-label">Material Cover:</td>
                                    <td>
                                        <input type="file" name="userfile" size="20" class="input-box-fill">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo form_label('Title', 'title', $attributes = array('class' => 'input-box-label')); ?>
                                        
                                    </td>
                                    
                                    
                                    <td>
                                        <?php echo form_input('title',set_value('title'),$attributes = array('class' => 'input-box-fill')) ?>
                                        
                                    <small style="color:red;">*</small>
                                    <small style='display:inline-block;'><?php echo form_error('title'); ?></small>
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo form_label('Author', 'author', $attributes = array('class' => 'input-box-label')); ?>
 
                                    </td>
                                    
                                    <td>
                                        <?php echo form_input('author',set_value('author'),$attributes = array('class' => 'input-box-fill')) ?>                                       
                                        <small style="color:red;">*</small>
                                        <small style="display:inline-block"><?php echo form_error('author'); ?></small>
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo form_label('Publisher', 'publisher', $attributes = array('class' => 'input-box-label')); ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo form_input('publisher',set_value('publisher'),$attributes = array('class' => 'input-box-fill')) ?>                                       
                                        <small style="color:red;">*</small>
                                        <small style="display:inline-block"><?php echo form_error('publisher'); ?></small>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="input-box-label">Published Date:</td>
                                    <td>
                                        <input type="date" name="publish-date" class="input-box-fill">
                                        <small style="color:red;">*</small>
                                        <small style="display:inline-block"><?php echo form_error('publish-date'); ?></small>
                                    </td>
                                                                           
                                        
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo form_label('Book Number', 'book-number', $attributes = array('class' => 'input-box-label')); ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo form_input('book-number',set_value('book-number'),$attributes = array('class' => 'input-box-fill')) ?>                                       
                                        <small style="color:red;">*</small>
                                        <small style="display:inline-block"><?php echo form_error('book-number'); ?></small>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="input-box-label">Genre: </td>
                                    <td>
                                        <select name="genre" class="input-box-fill">
                                            <option>Horror</option>	
                                            <option>Romance</option>	
                                            <option>Educational</option>	
                                            <option>Sci-Fi</option>	
                                            <option>Fictional</option>	
                                            <option>N/A</option>	
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="input-box-label">Department: </td>
                                    <td>
                                        <select name="department" class="input-box-fill dep">
                                            <?php foreach($departments as $department): ?>
                                                <option data-id="<?php echo $department['id']; ?>" value="<?php echo $department['name']; ?>"><?php echo $department['name']; ?></option> 
                                                <?php endforeach; ?>	
                                        </select>
                                        
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td class="input-box-label">Program: </td>
                                    <td>
                                        <select name="program" class="input-box-fill prog ">
                                            <option value=""></option>
                                                <?php foreach($programs as $program): ?>
                                                <option data-id="<?php echo $program['department_id']; ?>" value = "<?php echo $program['name']; ?>" ><?php echo $program['name']; ?></option> 
                                                <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="input-box-label">Location: </td>
                                    <td>
                                        <select name="location" class="input-box-fill">
                                            <option>Circulation Resources</option>
                                            <option>References/Filipiniana</option>
                                            <option>EMRC</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo form_label('Quantity', 'quantity', $attributes = array('class' => 'input-box-label')); ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo form_input('quantity',set_value('quantity'),$attributes = array('class' => 'input-box-fill')) ?>
                                                                               
                                        <small style="color:red;">*</small>
                                        <small style="display:inline-block"><?php echo form_error('quantity'); ?></small>
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <td>
                                        <?php echo form_label('Summary/Sypnosis', 'about', $attributes = array('class' => 'input-box-label')); ?>
                                    </td>
                                    
                                    <td>
                                         <?php
                                        $data = array(
                                            "name" => "about",
                                            "value" => set_value('about'),
                                            "class" => "input-box-fill",
                                            "rows" => "4",
                                            "cols" => "35"
                                        );
                                        echo form_textarea($data); ?>
                                        <small style="color:red;">*</small>
                                        <small style="display:inline-block"><?php echo form_error('about'); ?></small>
                                        
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" name="s" value="ADD ENTRY" class="submit-input-button">
                        </form>
                    </div> <!-- end of page option view -->
            </div><!-- end of page content -->
    </div> <!-- end of page body holder -->            


