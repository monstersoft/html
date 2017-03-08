
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<link rel="image_src" type="image/jpeg" href="/images/logo.png" />

<!-- Site Properities -->
<meta name="generator" content="DocPad v6.78.4" />
<title>Step | Semantic UI</title>

<meta name="description" content="A step shows the completion status of an activity in a series of activities" />
<meta name="keywords" content="html5, ui, library, framework, javascript" />
  
  <script src="/javascript/library/jquery.min.js"></script>
  <script src="/javascript/library/clipboard.min.js"></script>
  <script src="/javascript/library/cookie.min.js"></script>
  <script src="/javascript/library/easing.min.js"></script>
  <script src="/javascript/library/highlight.min.js"></script>
  <script src="/javascript/library/history.min.js"></script>
  <script src="/javascript/library/tablesort.min.js"></script>





<script src="semantic/semantic.min.js"></script>



<script src="/javascript/docs.js"></script>

  
<link rel="stylesheet" type="text/css" class="ui" href="semantic/semantic.min.css">




<link rel="stylesheet" type="text/css" href="/stylesheets/docs.css">
<link rel="stylesheet" type="text/css" href="/stylesheets/rtl.css">





  
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44039803-2', 'auto');
  ga('send', 'pageview');
</script>

  
<script type="text/javascript">
  window.liveSettings = {
    api_key    : '9ede3015b9f84c1aabc81ab839c55d74',
    parse_attr : [
      'data-title',
      'data-content'
    ],
    detectlang   : false,
    autocollect  : true,
    ignore_tags  : ['i', 'code', 'pre'],
    parse_attr   : ['data-title', 'data-content', 'data-text'],
    ignore_class : ['code', 'anchor']
  };
</script>
<script type="text/javascript" src="http://cdn.transifex.com/live.js"></script>

</head>
<body id="example" class="steps" ontouchstart="">
  
  <div class="ui vertical inverted sidebar menu" id="toc">
  








<div class="item">
  <a class="ui logo icon image" href="/">
    <img src="/images/logo.png">
  </a>
  <a href="/"><b>UI Docs</b></a>
</div>
<a class="item" href="/introduction/getting-started.html">
  <b>Getting Started</b>
</a>
<a class="item" href="/introduction/new.html">
  <b>New in 2.2</b>
</a>
<div class="item">
  <div class="header">Introduction</div>
  <div class="menu">
    
      <a class="item" href="/introduction/integrations.html">
        Integrations
      </a>
    
      <a class="item" href="/introduction/build-tools.html">
        Build Tools
      </a>
    
      <a class="item" href="/introduction/advanced-usage.html">
        Recipes
      </a>
    
      <a class="item" href="/introduction/glossary.html">
        Glossary
      </a>
    
  </div>
</div>

</div>

<div class="ui black big launch right attached fixed button">
  <i class="content icon"></i>
  <span class="text">Menu</span>
</div>
  




<div class="ui fixed inverted main menu">
  <div class="ui container">
    <a class="launch icon item">
      <i class="content icon"></i>
    </a>
    
      <div class="item">
        Step
      </div>
    
    <div class="right menu">
      
      <div class="vertically fitted borderless item">
        <iframe class="github" src="http://ghbtns.com/github-btn.html?user=semantic-org&amp;repo=semantic-ui&amp;type=watch&amp;count=true" allowtransparency="true" frameborder="0" scrolling="0" width="100" height="20"></iframe>
      </div>
      
      <!--
      <div class="item">
        <div class="ui hidden right aligned search input" id="search">
          <div class="ui transparent icon input">
            <input class="prompt" type="text" placeholder="Search...">
            <i class="inverted search link icon" data-content="Search UI"></i>
          </div>
          <div class="results"></div>
        </div>
      </div>
      -->
    </div>
  </div>
</div>

  <div class="pusher">
    <div class="full height">
      <div class="toc">
        <div class="ui vertical inverted sticky menu">
        








<div class="item">
  <a class="ui logo icon image" href="/">
    <img src="/images/logo.png">
  </a>
  <a href="/"><b>UI Docs</b></a>
</div>
<a class="item" href="/introduction/getting-started.html">
  <b>Getting Started</b>
</a>
<a class="item" href="/introduction/new.html">
  <b>New in 2.2</b>
</a>
<div class="item">
  <div class="header">Introduction</div>
  <div class="menu">
    
      <a class="item" href="/introduction/integrations.html">
        Integrations
      </a>
    
      <a class="item" href="/introduction/build-tools.html">
        Build Tools
      </a>
    
      <a class="item" href="/introduction/advanced-usage.html">
        Recipes
      </a>
    
      <a class="item" href="/introduction/glossary.html">
        Glossary
      </a>
    
  </div>
</div>
<div class="item">
  <div class="header">Usage</div>
  <div class="menu">
    
      <a class="item" href="/usage/theming.html">
        Theming
      </a>
    
      <a class="item" href="/usage/layout.html">
        Layouts
      </a>
    
  </div>
</div>
<div class="item">
  <div class=" header">Globals</div>
  <div class="menu">
    
      <a class="item" href="/globals/reset.html">
        Reset
        
      </a>
    
      <a class="item" href="/globals/site.html">
        Site
        
      </a>
    
  </div>
</div>
<div class="item">
  <div class="active  header">Elements</div>
  <div class="menu">
    
      <a class="item" href="/elements/button.html">
        Button
        
      </a>
    
      <a class="item" href="/elements/container.html">
        Container
        
      </a>
    
      <a class="item" href="/elements/divider.html">
        Divider
        
      </a>
    
      <a class="item" href="/elements/flag.html">
        Flag
        
      </a>
    
      <a class="item" href="/elements/header.html">
        Header
        
      </a>
    
      <a class="item" href="/elements/icon.html">
        Icon
        
      </a>
    
      <a class="item" href="/elements/image.html">
        Image
        
      </a>
    
      <a class="item" href="/elements/input.html">
        Input
        
      </a>
    
      <a class="item" href="/elements/label.html">
        Label
        
      </a>
    
      <a class="item" href="/elements/list.html">
        List
        
      </a>
    
      <a class="item" href="/elements/loader.html">
        Loader
        
      </a>
    
      <a class="item" href="/elements/rail.html">
        Rail
        
      </a>
    
      <a class="item" href="/elements/reveal.html">
        Reveal
        
      </a>
    
      <a class="item" href="/elements/segment.html">
        Segment
        
      </a>
    
      <a class="active item" href="/elements/step.html">
        Step
        
      </a>
    
  </div>
</div>
<div class="item">
  <div class=" header">Collections</div>
  <div class="menu">
    
      <a class="item" href="/collections/breadcrumb.html">
        Breadcrumb
        
      </a>
    
      <a class="item" href="/collections/form.html">
        Form
        
      </a>
    
      <a class="item" href="/collections/grid.html">
        Grid
        
      </a>
    
      <a class="item" href="/collections/menu.html">
        Menu
        
      </a>
    
      <a class="item" href="/collections/message.html">
        Message
        
      </a>
    
      <a class="item" href="/collections/table.html">
        Table
        
      </a>
    
  </div>
</div>
<div class="item">
  <div class=" header">Views</div>
  <div class="menu">
    
      <a class="item" href="/views/advertisement.html">
        Advertisement
        
      </a>
    
      <a class="item" href="/views/card.html">
        Card
        
      </a>
    
      <a class="item" href="/views/comment.html">
        Comment
        
      </a>
    
      <a class="item" href="/views/feed.html">
        Feed
        
      </a>
    
      <a class="item" href="/views/item.html">
        Item
        
      </a>
    
      <a class="item" href="/views/statistic.html">
        Statistic
        
      </a>
    
  </div>
</div>
<div class="item">
  <div class=" header">Modules</div>
  <div class="menu">
    
      <a class="item" href="/modules/accordion.html">
        Accordion
        
      </a>
  
      <a class="item" href="/modules/checkbox.html">
        Checkbox
        
      </a>
  
      <a class="item" href="/modules/dimmer.html">
        Dimmer
        
      </a>
  
      <a class="item" href="/modules/dropdown.html">
        Dropdown
        
      </a>
  
      <a class="item" href="/modules/embed.html">
        Embed
        
      </a>
  
      <a class="item" href="/modules/modal.html">
        Modal
        
      </a>
  
      <a class="item" href="/modules/nag.html">
        Nag
        
      </a>
  
      <a class="item" href="/modules/popup.html">
        Popup
        
      </a>
  
      <a class="item" href="/modules/progress.html">
        Progress
        
      </a>
  
      <a class="item" href="/modules/rating.html">
        Rating
        
      </a>
  
      <a class="item" href="/modules/search.html">
        Search
        
      </a>
  
      <a class="item" href="/modules/shape.html">
        Shape
        
      </a>
  
      <a class="item" href="/modules/sidebar.html">
        Sidebar
        
      </a>
  
      <a class="item" href="/modules/sticky.html">
        Sticky
        
      </a>
  
      <a class="item" href="/modules/tab.html">
        Tab
        
      </a>
  
      <a class="item" href="/modules/transition.html">
        Transition
        
      </a>
  
  </div>
</div>
<div class="item">
  <div class=" header">Behaviors</div>
  <div class="menu">
    
      <a class="item" href="/behaviors/api.html">
        API
        
      </a>
    
      <a class="item" href="/behaviors/form.html">
        Form Validation
        
      </a>
    
      <a class="item" href="/behaviors/visibility.html">
        Visibility
        
      </a>
    
  </div>
</div>
  </div>

  <script>
window.less = {
  async        : true,
  environment  : 'production',
  fileAsync    : false,
  onReady      : false,
  useFileCache : true
};
</script>

<script src="/javascript/library/less.min.js"></script>


</body>

</html>