<div class="page-content-wrapper border">

    <h4 class="fs-5 ff-vb">جزئیات دوره</h4>

    <hr> <!-- Divider -->

    <!-- Basic information START -->
    <div class="row g-4">
        <div class="col-12">
            <div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                <label class="form-label">آپلود بنر</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control upload-name-image border-end-0" id="inputGroupFile"/>
                    <span class="btn btn btn-secondary-soft cursor-pointer upload-button-image border-start-0">آپلود بنر</span>
                </div>
                <input wire:model="image" type="file" class="d-none hidden-upload-image"/>
            </div>
        </div>
        <div class="col-12">
            <div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                <label class="form-label">آپلود ویدیو</label>

                <div class="input-group mb-3">
                    <label class="input-group-text" dir="ltr">.mp4</label>
                    <input type="text" class="form-control upload-name-mp4 border-end-0" id="inputGroupFile01"/>
                    <span class="btn btn btn-secondary-soft cursor-pointer upload-button-mp4 border-start-0">آپلود فایل</span>

                </div>
                <input wire:model="video" type="file" class="d-none hidden-upload-mp4"/>
                <div class="progress m-b-10">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
                    </div>
                </div>
            </div>
        </div>
        <!-- Course title -->
        <div class="col-12">
            <label class="form-label">عنوان</label>
            <input wire:model="title" class="form-control" type="text" placeholder="آموزش ساخت وب سایت خبری">
        </div>

        <!-- Short description -->
        <div class="col-12">
            <label class="form-label">توضیحات کوتاه</label>
            <textarea wire:model="description" class="form-control" rows="2" placeholder="کلمات کلیدی"></textarea>
        </div>

        <!-- Course category -->
        <div class="col-md-6">
            <label class="form-label">دسته بندی</label>
            <select wire:model="category_id" class="form-select js-choice border-0 z-index-9 bg-transparent" aria-label=".form-select-sm" data-search-enabled="true">
                <option value="">انتخاب</option>
                <option>مهندسی</option>
                <option>پزشکی</option>
                <option>طراحی وب</option>
                <option>حسابداری</option>
                <option>برنامه نویسی</option>
            </select>
        </div>

        <!-- Course level -->
        <div class="col-md-6">
            <label class="form-label">سطح دوره</label>
            <select wire:model="level" class="form-select js-choice border-0 z-index-9 bg-transparent" aria-label=".form-select-sm" data-search-enabled="false" data-remove-item-button="true">
                <option value="">انتخاب سطح</option>
                <option>همه</option>
                <option>مقدماتی</option>
                <option>متوسطه</option>
                <option>پیشرفته</option>
            </select>
        </div>

        <!-- Course price -->
        <div class="col-md-6">
            <label class="form-label">قیمت</label>
            <input wire:model="price" type="text" class="form-control" placeholder="90,000 تومان">
        </div>
        <div class="col-md-6 d-flex align-items-center mt-6">
            <button wire:click="createTeacherCourse" class="btn btn-primary">ثبت</button>
        </div>

    </div>
</div>
@push('scripts')
    <script>
        // Upload image
        document.querySelector(".upload-button-image").onclick = function() {
            document.querySelector(".hidden-upload-image").click();
        };

        document.querySelector(".hidden-upload-image").onchange = function() {
            document.querySelector(".upload-name-image").value = event.target.files[0].name;
        };

        // Upload Video .mp4
        document.querySelector(".upload-button-mp4").onclick = function() {
            document.querySelector(".hidden-upload-mp4").click();
        };

        document.querySelector(".hidden-upload-mp4").onchange = function() {
            document.querySelector(".upload-name-mp4").value = event.target.files[0].name;
        };
    </script>
@endpush
