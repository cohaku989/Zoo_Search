import './bootstrap';

import React from 'react';
import { render } from 'react-dom';
import { createInertiaApp } from '@inertiajs/inertia-react';
import { InertiaProgress } from '@inertiajs/progress';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

if(typeof app != 'undefined'){
    createInertiaApp({
        title: (title) => `${title} - ${appName}`,
        resolve: name => {
            const pages = import.meta.glob('./Pages/**/*.jsx', { eager: true })
            return pages[`./Pages/${name}.jsx`]
          },
        setup({ el, App, props }) {
            return render(<App {...props} />, el);
        },
    });   
}

InertiaProgress.init({ color: '#4B5563' });