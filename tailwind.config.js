module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
        './resources/css/**/*.css',
    ],
    theme: {
        extend: {
            colors: {
                'rave-purple': '#8A2BE2',
                'rave-pink': '#FF007F',
                'rave-blue': '#00FFFF',
                'rave-green': '#39FF14',
            },
            animation: {
                'pulse-slow': 'pulse 5s infinite',
                'spin-slow': 'spin 10s linear infinite',
            },
        },
    },
    variants: {
        extend: {
            animation: ['hover', 'focus'],
        },
    },
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    plugins: [
        require('@tailwindcss/ui'),
    ],
}
