import Vue from 'vue'
import Router from 'vue-router'
import { getRootUrl, generateUrl } from '@nextcloud/router'

import Shifts from './views/Shifts'

import NewShift from './views/NewShift'
import NewShiftType from './views/NewShiftType'
import Requests from './views/Requests'

Vue.use(Router)

const webRootWithIndexPHP = getRootUrl() + '/index.php'
const doesURLContainIndexPHP = window.location.pathname.startsWith(webRootWithIndexPHP)
const base = generateUrl('apps/shifts', {}, {
	noRewrite: doesURLContainIndexPHP,
})

// Vue Router
const router = new Router({
	mode: 'history',
	base,
	linkActiveClass: 'active',
	routes: [
		{
			path: '/',
			component: Shifts,
			name: 'MainView',
			children: [
				{
					path: 'newShift',
					name: 'NewShiftPopoverView',
					component: NewShift,
				},
				{
					path: 'newShiftType',
					name: 'NewShiftTypePopoverView',
					component: NewShiftType,
				},
			],
		},
		{
			path: '/requests',
			component: Requests,
			name: 'RequestsView',
		},
	],
})

export default router
