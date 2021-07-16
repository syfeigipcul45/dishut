@extends('layouts.admin.template.template')

@section('title')
Edit Berita
@endsection

@section('berita')
active
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Berita</h2>
                    </div>
                    <div class="body">
                        <form action="{{route('berita.update', $berita->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-12">
                                <h2 class="card-inside-title">Judul Berita</h2>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="judul_berita" id="judul_berita" placeholder="Judul Berita" value="{{$berita->judul_berita}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h2 class="card-inside-title">Isi Berita</h2>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="isi_berita" id="tinymce">{{$berita->isi_berita}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h2 class="card-inside-title">Gambar Berita</h2>
                                <div class="form-group">
                                    <div class="form-line">
                                        <span style="font-size: 12px; font-style: italic; color: red;">*) File harus berupa .jpg, .jpeg, .png, maksimal file sebesar 5 MB</span>
                                        <input type="file" class="form-control" name="gambar_berita" id="gambar_berita" accept="images/*">
                                        <br><img class="b p-xs" style="max-width: 350px; max-height: 150px;" src="{{asset('admin/images/foto-berita/'.$berita->gambar_berita)}}" id="output">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            <a href="{{route('berita.index')}}" class="btn btn-warning waves-effect" role="button" aria-haspopup="true" aria-expanded="false">
                                KEMBALI
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation -->
    </div>
</section>
<script text="text/javascript">
    var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    tinymce.init({
        selector: "textarea#tinymce",
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        link_list: [{
                title: 'My page 1',
                value: 'https://www.tiny.cloud'
            },
            {
                title: 'My page 2',
                value: 'http://www.moxiecode.com'
            }
        ],
        image_list: [{
                title: 'My page 1',
                value: 'https://www.tiny.cloud'
            },
            {
                title: 'My page 2',
                value: 'http://www.moxiecode.com'
            }
        ],
        image_class_list: [{
                title: 'None',
                value: ''
            },
            {
                title: 'Some class',
                value: 'class-name'
            }
        ],
        importcss_append: true,
        file_picker_callback: function(callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
                callback('https://www.google.com/logos/google.jpg', {
                    text: 'My text'
                });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
                callback('https://www.google.com/logos/google.jpg', {
                    alt: 'My alt text'
                });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
                callback('movie.mp4', {
                    source2: 'alt.ogg',
                    poster: 'https://www.google.com/logos/google.jpg'
                });
            }
        },
        templates: [{
                title: 'New Table',
                description: 'creates a new table',
                content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
            },
            {
                title: 'Starting my story',
                description: 'A cure for writers block',
                content: 'Once upon a time...'
            },
            {
                title: 'New list with dates',
                description: 'New List with dates',
                content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
            }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 300,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image imagetools table',
        skin: useDarkMode ? 'oxide-dark' : 'oxide',
        content_css: useDarkMode ? 'dark' : 'default',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

    $('#gambar_berita').change(function() {
        let size = document.getElementById('gambar_berita').files[0].size / 1024 / 1024;
        let extension = $('#gambar_berita').val().split('.').pop().toLowerCase();
        if ((jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) && size > 5) {
            iziToast.error({
                title: 'Error',
                message: 'File Tidak Sesuai dan ukuran file terlalu besar',
                position: 'topCenter'
            });
            $('#gambar_berita').val("");
        } else if ((jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1)) {
            iziToast.error({
                title: 'Error',
                message: 'File tidak sesuai',
                position: 'topCenter'
            });
            $('#gambar_berita').val("");
            return false;
        } else if (size > 5) {
            iziToast.error({
                title: 'Error',
                message: 'File terlalu besar',
                position: 'topCenter'
            });
            $('#gambar_berita').val("");
            return false;
        } else {
            let output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    });
</script>
@endsection