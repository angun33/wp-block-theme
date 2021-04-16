import babel from '@rollup/plugin-babel';
import { terser } from 'rollup-plugin-terser';
import { nodeResolve } from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';

const dev = process.env.NODE_ENV !== 'production'
export default {
  input: 'encore/src/scripts/index.js',
  output: {
    dir: 'encore/',
    format: 'esm'
  },
  plugins: [
    nodeResolve(),
    commonjs(),
    babel({
      babelHelpers: 'bundled',
      presets: [
        [ "@babel/preset-env", { useBuiltIns: "usage", modules: false, corejs: 3 } ]
      ],
      exclude: [/\/core-js\//]
    }),
    !dev && terser(),
  ],
  watch: {
    clearScreen: false,
  },
}