(window.webpackJsonp=window.webpackJsonp||[]).push([[39],{eJ9N:function(l,n,u){"use strict";u.r(n);var e=u("CcnG"),t=u("OaAl"),o=u("xXEB"),i=function(){function l(l,n,u){this.suporteService=l,this.fb=n,this.notificationService=u,this.total=0,this.loader=!0,this.page=1,this.itensPorPagina=10}return l.prototype.ngOnInit=function(){this.searchControl=this.fb.control(""),this.searchForm=this.fb.group({searchControl:this.searchControl}),this.getSuportes()},l.prototype.getSuportes=function(){var l=this;this.suporteService.getSuportes().subscribe(function(n){l.suportes=n,l.loader=!1})},l.prototype.InativarSuporte=function(l){var n=this;confirm("Voc\xea tem certeza que deseja remover a Suporte ")&&(this.loader=!0,this.suporteService.inativar(l.id).subscribe(function(u){"ok"==u.success&&(n.suportes.splice(n.suportes.indexOf(l),1),n.notificationService.notify("Voc\xea removeu a Suporte")),n.loader=!1}))},l.prototype.update=function(l){this.suporteService.update(l,l.id)},l}(),r=function(){return function(){}}(),a=u("pMnS"),d=u("gIcY"),c=u("ZYCi"),s=u("L7SE"),p=u("Ip0R"),g=e["\u0275crt"]({encapsulation:0,styles:[[""]],data:{}});function m(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,30,"tr",[],null,null,null,null,null)),(l()(),e["\u0275eld"](1,0,null,null,6,"td",[],null,null,null,null,null)),(l()(),e["\u0275eld"](2,0,[["title",1]],null,5,"input",[["class","inputGrid"],["type","text"]],[[8,"value",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"change"],[null,"ngModelChange"],[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0,o=l.component;return"input"===n&&(t=!1!==e["\u0275nov"](l,3)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,3).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,3)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,3)._compositionEnd(u.target.value)&&t),"change"===n&&(t=!1!==o.update(l.context.$implicit)&&t),"ngModelChange"===n&&(t=!1!==(l.context.$implicit.title=u)&&t),t},null,null)),e["\u0275did"](3,16384,null,0,d.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,d.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275prd"](1024,null,d.NG_VALUE_ACCESSOR,function(l){return[l]},[d.DefaultValueAccessor]),e["\u0275did"](5,671744,null,0,d.NgModel,[[8,null],[8,null],[8,null],[6,d.NG_VALUE_ACCESSOR]],{model:[0,"model"]},{update:"ngModelChange"}),e["\u0275prd"](2048,null,d.NgControl,null,[d.NgModel]),e["\u0275did"](7,16384,null,0,d.NgControlStatus,[[4,d.NgControl]],null,null),(l()(),e["\u0275eld"](8,0,null,null,6,"td",[],null,null,null,null,null)),(l()(),e["\u0275eld"](9,0,[["subtitle",1]],null,5,"input",[["class","inputGrid"],["type","text"]],[[8,"value",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"change"],[null,"ngModelChange"],[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0,o=l.component;return"input"===n&&(t=!1!==e["\u0275nov"](l,10)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,10).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,10)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,10)._compositionEnd(u.target.value)&&t),"change"===n&&(t=!1!==o.update(l.context.$implicit)&&t),"ngModelChange"===n&&(t=!1!==(l.context.$implicit.subtitle=u)&&t),t},null,null)),e["\u0275did"](10,16384,null,0,d.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,d.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275prd"](1024,null,d.NG_VALUE_ACCESSOR,function(l){return[l]},[d.DefaultValueAccessor]),e["\u0275did"](12,671744,null,0,d.NgModel,[[8,null],[8,null],[8,null],[6,d.NG_VALUE_ACCESSOR]],{model:[0,"model"]},{update:"ngModelChange"}),e["\u0275prd"](2048,null,d.NgControl,null,[d.NgModel]),e["\u0275did"](14,16384,null,0,d.NgControlStatus,[[4,d.NgControl]],null,null),(l()(),e["\u0275eld"](15,0,null,null,6,"td",[],null,null,null,null,null)),(l()(),e["\u0275eld"](16,0,[["value",1]],null,5,"input",[["class","inputGrid"],["type","text"]],[[8,"value",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"change"],[null,"ngModelChange"],[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0,o=l.component;return"input"===n&&(t=!1!==e["\u0275nov"](l,17)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,17).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,17)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,17)._compositionEnd(u.target.value)&&t),"change"===n&&(t=!1!==o.update(l.context.$implicit)&&t),"ngModelChange"===n&&(t=!1!==(l.context.$implicit.value=u)&&t),t},null,null)),e["\u0275did"](17,16384,null,0,d.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,d.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275prd"](1024,null,d.NG_VALUE_ACCESSOR,function(l){return[l]},[d.DefaultValueAccessor]),e["\u0275did"](19,671744,null,0,d.NgModel,[[8,null],[8,null],[8,null],[6,d.NG_VALUE_ACCESSOR]],{model:[0,"model"]},{update:"ngModelChange"}),e["\u0275prd"](2048,null,d.NgControl,null,[d.NgModel]),e["\u0275did"](21,16384,null,0,d.NgControlStatus,[[4,d.NgControl]],null,null),(l()(),e["\u0275eld"](22,0,null,null,2,"td",[],null,null,null,null,null)),(l()(),e["\u0275ted"](23,null,[" "," "])),e["\u0275ppd"](24,2),(l()(),e["\u0275eld"](25,0,null,null,5,"td",[],null,null,null,null,null)),(l()(),e["\u0275eld"](26,0,null,null,1,"i",[["aria-hidden","true"],["class","fa fa-search"],["style","padding-right: 5px;cursor: pointer"]],null,[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==e["\u0275nov"](l,27).onClick()&&t),t},null,null)),e["\u0275did"](27,16384,null,0,c.m,[c.l,c.a,[8,null],e.Renderer2,e.ElementRef],{routerLink:[0,"routerLink"]},null),(l()(),e["\u0275eld"](28,0,null,null,1,"i",[["aria-hidden","true"],["class","fa fa-pencil-square-o"],["style","padding-right: 5px;cursor: pointer"]],null,[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==e["\u0275nov"](l,29).onClick()&&t),t},null,null)),e["\u0275did"](29,16384,null,0,c.m,[c.l,c.a,[8,null],e.Renderer2,e.ElementRef],{routerLink:[0,"routerLink"]},null),(l()(),e["\u0275eld"](30,0,null,null,0,"i",[["aria-hidden","true"],["class","fa fa-minus-square"],["style","padding-right: 5px;cursor: pointer"]],null,[[null,"click"]],function(l,n,u){var e=!0;return"click"===n&&(e=!1!==l.component.InativarSuporte(l.context.$implicit)&&e),e},null,null))],function(l,n){l(n,5,0,n.context.$implicit.title),l(n,12,0,n.context.$implicit.subtitle),l(n,19,0,n.context.$implicit.value),l(n,27,0,e["\u0275inlineInterpolate"](1,"/suporte-detalhar/",null==n.context.$implicit?null:n.context.$implicit.id,"")),l(n,29,0,e["\u0275inlineInterpolate"](1,"/suporte/alterar/",null==n.context.$implicit?null:n.context.$implicit.id,""))},function(l,n){l(n,2,0,e["\u0275inlineInterpolate"](1,"",null==n.context.$implicit?null:n.context.$implicit.title,""),e["\u0275nov"](n,7).ngClassUntouched,e["\u0275nov"](n,7).ngClassTouched,e["\u0275nov"](n,7).ngClassPristine,e["\u0275nov"](n,7).ngClassDirty,e["\u0275nov"](n,7).ngClassValid,e["\u0275nov"](n,7).ngClassInvalid,e["\u0275nov"](n,7).ngClassPending),l(n,9,0,e["\u0275inlineInterpolate"](1,"",null==n.context.$implicit?null:n.context.$implicit.subtitle,""),e["\u0275nov"](n,14).ngClassUntouched,e["\u0275nov"](n,14).ngClassTouched,e["\u0275nov"](n,14).ngClassPristine,e["\u0275nov"](n,14).ngClassDirty,e["\u0275nov"](n,14).ngClassValid,e["\u0275nov"](n,14).ngClassInvalid,e["\u0275nov"](n,14).ngClassPending),l(n,16,0,e["\u0275inlineInterpolate"](1,"",null==n.context.$implicit?null:n.context.$implicit.value,""),e["\u0275nov"](n,21).ngClassUntouched,e["\u0275nov"](n,21).ngClassTouched,e["\u0275nov"](n,21).ngClassPristine,e["\u0275nov"](n,21).ngClassDirty,e["\u0275nov"](n,21).ngClassValid,e["\u0275nov"](n,21).ngClassInvalid,e["\u0275nov"](n,21).ngClassPending);var u=e["\u0275unv"](n,23,0,l(n,24,0,e["\u0275nov"](n.parent,0),null==n.context.$implicit?null:n.context.$implicit.bo_ativo,"boativo"));l(n,23,0,u)})}function v(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,0,"div",[["class","loader"]],null,null,null,null,null))],null,null)}function f(l){return e["\u0275vid"](0,[e["\u0275pid"](0,s.a,[]),(l()(),e["\u0275eld"](1,0,null,null,35,"div",[["class","container-fluid"]],null,null,null,null,null)),(l()(),e["\u0275eld"](2,0,null,null,34,"div",[["class","row"]],null,null,null,null,null)),(l()(),e["\u0275eld"](3,0,null,null,33,"div",[["class","col-md-12"]],null,null,null,null,null)),(l()(),e["\u0275eld"](4,0,null,null,32,"div",[["class","card"]],null,null,null,null,null)),(l()(),e["\u0275eld"](5,0,null,null,8,"div",[["class","card-header card-header-primary"]],null,null,null,null,null)),(l()(),e["\u0275eld"](6,0,null,null,1,"h4",[["class","card-title "]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Suporte "])),(l()(),e["\u0275eld"](8,0,null,null,1,"p",[["class","card-category"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,[" Para alterar basta mudar os valores na linhas"])),(l()(),e["\u0275eld"](10,0,null,null,3,"div",[["class","add"],["routerLink","/suporte/incluir"]],null,[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==e["\u0275nov"](l,11).onClick()&&t),t},null,null)),e["\u0275did"](11,16384,null,0,c.m,[c.l,c.a,[8,null],e.Renderer2,e.ElementRef],{routerLink:[0,"routerLink"]},null),(l()(),e["\u0275eld"](12,0,null,null,1,"i",[["class","material-icons add-icon"],["style","font-size:5em"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,[" add_circle "])),(l()(),e["\u0275eld"](14,0,null,null,22,"div",[["class","card-body"]],null,null,null,null,null)),(l()(),e["\u0275eld"](15,0,null,null,21,"div",[["class","table-responsive"]],null,null,null,null,null)),(l()(),e["\u0275eld"](16,0,null,null,20,"table",[["class","table"]],null,null,null,null,null)),(l()(),e["\u0275eld"](17,0,null,null,16,"thead",[["class"," text-primary"]],null,null,null,null,null)),(l()(),e["\u0275eld"](18,0,null,null,15,"tr",[],null,null,null,null,null)),(l()(),e["\u0275eld"](19,0,null,null,2,"th",[],null,null,null,null,null)),(l()(),e["\u0275eld"](20,0,null,null,1,"b",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["T\xedtulo"])),(l()(),e["\u0275eld"](22,0,null,null,2,"th",[],null,null,null,null,null)),(l()(),e["\u0275eld"](23,0,null,null,1,"b",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Subt\xedtulo"])),(l()(),e["\u0275eld"](25,0,null,null,2,"th",[],null,null,null,null,null)),(l()(),e["\u0275eld"](26,0,null,null,1,"b",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Valor"])),(l()(),e["\u0275eld"](28,0,null,null,2,"th",[],null,null,null,null,null)),(l()(),e["\u0275eld"](29,0,null,null,1,"b",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Ativo/Inativo"])),(l()(),e["\u0275eld"](31,0,null,null,2,"td",[["width","90"]],null,null,null,null,null)),(l()(),e["\u0275eld"](32,0,null,null,1,"b",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Op\xe7\xf5es"])),(l()(),e["\u0275eld"](34,0,null,null,2,"tbody",[],null,null,null,null,null)),(l()(),e["\u0275and"](16777216,null,null,1,null,m)),e["\u0275did"](36,278528,null,0,p.NgForOf,[e.ViewContainerRef,e.TemplateRef,e.IterableDiffers],{ngForOf:[0,"ngForOf"]},null),(l()(),e["\u0275and"](16777216,null,null,1,null,v)),e["\u0275did"](38,16384,null,0,p.NgIf,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null)],function(l,n){var u=n.component;l(n,11,0,"/suporte/incluir"),l(n,36,0,u.suportes),l(n,38,0,u.loader)},null)}function h(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"app-suporte",[],null,null,null,f,g)),e["\u0275did"](1,114688,null,0,i,[o.a,d.FormBuilder,t.a],null,null)],function(l,n){l(n,1,0)},null)}var C=e["\u0275ccf"]("app-suporte",i,h,{},{},[]),_=u("UVXo"),S=u("UoT3"),M=u("PCNd");u.d(n,"SuporteModuleNgFactory",function(){return b});var b=e["\u0275cmf"](r,[],function(l){return e["\u0275mod"]([e["\u0275mpd"](512,e.ComponentFactoryResolver,e["\u0275CodegenComponentFactoryResolver"],[[8,[a.a,C]],[3,e.ComponentFactoryResolver],e.NgModuleRef]),e["\u0275mpd"](4608,p.NgLocalization,p.NgLocaleLocalization,[e.LOCALE_ID,[2,p["\u0275angular_packages_common_common_a"]]]),e["\u0275mpd"](4608,d["\u0275angular_packages_forms_forms_j"],d["\u0275angular_packages_forms_forms_j"],[]),e["\u0275mpd"](4608,d.FormBuilder,d.FormBuilder,[]),e["\u0275mpd"](1073742336,_.TextMaskModule,_.TextMaskModule,[]),e["\u0275mpd"](1073742336,p.CommonModule,p.CommonModule,[]),e["\u0275mpd"](1073742336,d["\u0275angular_packages_forms_forms_bc"],d["\u0275angular_packages_forms_forms_bc"],[]),e["\u0275mpd"](1073742336,d.FormsModule,d.FormsModule,[]),e["\u0275mpd"](1073742336,S.CurrencyMaskModule,S.CurrencyMaskModule,[]),e["\u0275mpd"](1073742336,d.ReactiveFormsModule,d.ReactiveFormsModule,[]),e["\u0275mpd"](1073742336,M.a,M.a,[]),e["\u0275mpd"](1073742336,c.p,c.p,[[2,c.v],[2,c.l]]),e["\u0275mpd"](1073742336,r,r,[]),e["\u0275mpd"](1024,c.j,function(){return[[{path:"",component:i}]]},[])])})}}]);