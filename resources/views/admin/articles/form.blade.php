@if (count($errors) > 0)
   <div class="col s12">
       <div class="card">
           <div class="card-content">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       </div>
   </div>
@endif

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                {{-- 
                <pre>
                    {{ var_dump(Route::currentRouteName()) }}
                </pre>
                 --}}

                 @php
                    if (Route::currentRouteName() == 'admin.articles.create') {
                        $title = 'Créér un nouvel article';
                        $params = ['route' => 'admin.articles.store', 'files' => true];
                    }
                    else {
                        $title = "Editer l'article";
                        $params = ['method' => 'PUT','route' => ['admin.articles.update', $article->id], 'files' => true];
                    }
                @endphp

                <h4>{{ $title }}</h4>
                {!! Form::open($params) !!}
                    <div class="input-field">
                        <label for="title">Titre</label>
                        <input type="text" name="title" title="Titre" value="{{ $article->title or '' }}">
                    </div>
                    <div class="input-field">
                        <input type="file" name="image" id="file" placeholder="glisser déposer une image">
                    </div>
                    <div class="input-field">
                        <label>Tags</label>
                        <input type="text" name="tags" title="tags" value="{{ $article['attributes']['tags'] or '' }}">
                    </div>

                    <div class="input-field">
                        <label>Contenu</label>
                        <textarea name="content" rows="15" title="content">{{ $article->content or '' }}</textarea>
                    </div>

                    <div class="input-field">
                        <button type="submit" class="btn">GO</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    
<script src='//cloud.tinymce.com/stable/tinymce.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/plugins/code/plugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/plugins/wordcount/plugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/plugins/fullscreen/plugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/plugins/media/plugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/plugins/image/plugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/plugins/link/plugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/plugins/advlist/plugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/plugins/textpattern/plugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/plugins/contextmenu/plugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/plugins/preview/plugin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/plugins/imagetools/plugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.4/plugins/charmap/plugin.min.js"></script>

<script>
    tinymce.init({ 
        selector:'textarea',
     //   entity_encoding : 'raw',
        encoding: 'UTF-8',
        plugins: 'code wordcount media image link advlist textpattern contextmenu preview fullscreen imagetools charmap',
        toolbar: 'code wordcount media image link advlist textpattern contextmenu preview fullscreen imagetools charmap',
        menubar: 'view tools wordcount media image link advlist textpattern contextmenu preview fullscreen imagetools charmap',
        textpattern_patterns: [
            {start: '*', end: '*', format: 'italic'},
            {start: '**', end: '**', format: 'bold'},
            {start: '#', format: 'h1'},
            {start: '##', format: 'h2'},
            {start: '###', format: 'h3'},
            {start: '####', format: 'h4'},
            {start: '#####', format: 'h5'},
            {start: '######', format: 'h6'},
            {start: '1. ', cmd: 'InsertOrderedList'},
            {start: '* ', cmd: 'InsertUnorderedList'},
            {start: '- ', cmd: 'InsertUnorderedList'}
        ]
    });
</script>