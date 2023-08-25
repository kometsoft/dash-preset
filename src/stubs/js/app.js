import './bootstrap'

/**
 * Vue
 */

import { createApp } from 'vue'

const app = createApp({})

import Counter from './components/Counter.vue'
app.component('counter', Counter)

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//   app.component(
//     path
//       .split('/')
//       .pop()
//       .replace(/\.\w+$/, ''),
//     definition.default
//   )
// })

app.mount('#app')
