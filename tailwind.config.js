function dynamicHsl(h, s, l) {
  return ({ opacityVariable, opacityValue }) => {
      if (opacityValue !== undefined) {
          	return `hsla(${h}, ${s}, ${l}, ${opacityValue})`
      }
      if (opacityVariable !== undefined) {
          	return `hsla(${h}, ${s}, ${l}, var(${opacityVariable}, 1))`
      }
      return `hsl(${h}, ${s}, ${l})`
  }
}

/** @type {import('tailwindcss').Config} */
module.exports = {
	presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
	content: [
		"./resources/**/*.blade.php",
		"./resources/views/vendor/Chatify/layouts/*.blade.php",
		"./resources/views/vendor/Chatify/pages/*.blade.php",
		"./resources/**/*.js",
		"./resources/**/*.vue",
		"./node_modules/@themesberg/flowbite/**/*.js",
		'./vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
	],
  	theme: {
		extend: {
			colors: {
				primary: {
					DEFAULT: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'var(--color-primary-l)'),
					100: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) + 30%)'),
					200: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) + 24%)'),
					300: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) + 18%)'),
					400: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) + 12%)'),
					500: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) + 6%)'),
					600: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'var(--color-primary-l)'),
					700: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) - 6%)'),
					800: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) - 12%)'),
					900: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) - 18%)'),
				},
			},
			fontSize: {
                '5xl': '3.5em'
            },
		}
  	},
	plugins: [
		require('@tailwindcss/forms'),
		require("tailwindcss-animate"),
		require('flowbite/plugin'),
		require('@tailwindcss/aspect-ratio'),
		require('@tailwindcss/typography'),
		require('tailwind-scrollbar')
	],
}