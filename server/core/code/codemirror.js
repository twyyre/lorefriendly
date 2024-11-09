import {EditorState} from "@codemirror/state"
import {EditorView, keymap} from "@codemirror/view"
import {defaultKeymap} from "@codemirror/commands"

let startState = EditorState.create({
  doc: "Hello World",
  extensions: [keymap.of(defaultKeymap)]
})

let view = new EditorView({
  state: startState,
  parent: document.body
})

// import {EditorView, basicSetup} from "codemirror"
// import {javascript} from "@codemirror/lang-javascript"

// let view = new EditorView({
//   extensions: [basicSetup, javascript()],
//   parent: document.body
// })