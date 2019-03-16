import Master from './components/Master'
import Home from './components/Home'
import Kkck from './components/admin'
import Sc from './components/solicitar_cuenta'
import Loginc from './components/loginc'

import Admin from './components/Admin/Admin'
import Index from './components/Admin/index'
import Cc from './components/Admin/crea_cuenta'

import NotFound from './components/notfound'


let routes = [
	
	{
		path: '/',
	    component: Master,
	    name:'Admin',
	    redirect:'home',
	    iconCls:'el-icon-message',
	    meta:{auth:false},
	    children:[
	    	{path: '/home', name: 'home', component: Home, meta: {auth: false }},
	       
	        //{path: '/terminos',name: 'terminos',component: Terminos,meta: { auth: false }},
	    ] 
	},
     {path: '/loginc', name: 'loginc',component: Loginc, meta: { auth: false}},

	{
    path: '/admin/',
    component: Admin,
    name: 'Administration',
    redirect:'index',
    iconCls: 'el-icon-message',
    meta: {auth: true},
    children: [
        { path: '/index', component: Index, name: 'index' },
        { path: '/crear_cuenta/:id', component: Cc, name: 'crear_cuenta' },
    ]
},
	{path: '/kkck', name:'kkck', component: Kkck, meta:{auth:false}},
	 {path: '/sc',name: 'sc',component: Sc, meta: { auth: false }},
	 {
        path: '/404',
        component: NotFound,
        name: '',
        hidden: true
    },
    {
        path: '*',
        hidden: true,
        redirect: { path: '/404' }
    } 
]

export default routes;