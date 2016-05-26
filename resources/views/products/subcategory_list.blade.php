<option> Select the sub-category</option>
@foreach($subCats as $subCat)
    <option value="{{$subCat->subcategory_id}}" class="sub_option">{{$subCat->subcategory_name}}</option>

@endforeach