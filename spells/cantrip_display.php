<tr><td><input type='number' name='cantrip_level[]' id='cantrip_level' style='width:113px' value='<?PHP echo $cantrip_level;?>' REQUIRED></br>
</td>
<td><input type='text' name='cantrip_name[]' id='cantrip_name' size='40' value='<?PHP echo $cantrip_name;?>' REQUIRED placeholder='Spell Name'></br>
Range:
</br>
<input type='text' name='spell_range[]' id='spell_range' size='12' maxlength='10' value='<?PHP echo $spell_range;?>' placeholder='Range'></td>
<td><textarea rows='4' cols='100' maxlength='1600' name='description[]' id='description' placeholder='Add a Description'><?PHP echo $description;?></textarea>
<input type='hidden' name='cantrip_id[]' id='cantrip_id' value='<?PHP echo $cantrip_id?>'></td>
<td  id='Delete' ></br><a href='delete_cantrip.php?id=<?PHP echo $id;?>&cantrip=<?PHP echo $cantrip_id;?>'>Delete?</a></td>
</tr>