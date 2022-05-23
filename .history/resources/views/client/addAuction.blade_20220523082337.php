@enderror
</div>
        <span class="text-end yellow">* {{ $message }} </span>
    @enderror
    <div class="col-md-12 mb-2 my-2 m-auto">
          <img id="previewImage" 
             style="max-height: 100px;">
      </div>
      @error('images')
        <span class="text-end yellow">* {{ $message }} </span>
    @enderror
    <div class="col-md-12 mb-2 my-2 m-auto preview"></div>
</div>
<div class="mb-3 w-50 px-2 w-lg-100">
    <label for="basic-url" class="form-label text-light my-2"> حالة السيارة</label>
            </label>
        </div>
    </div>
    @error('care_type')
        <span class="text-end yellow">* {{ $message }} </span>
    @enderror
</div>