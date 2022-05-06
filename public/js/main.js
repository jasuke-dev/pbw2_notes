const notesContainer = document.getElementById("app");
const addNoteButton = notesContainer.querySelector(".add-note");

// getNotes().forEach((note) => {
//   const noteElement = createNoteElement(note.id, note.content);
//   notesContainer.insertBefore(noteElement, addNoteButton);
// });
getNotes();

addNoteButton.addEventListener("click", () => addNote());

function getNotes() {
  let id =1;
  // return JSON.parse(localStorage.getItem("stickynotes-notes") || "[]");
  fetch(`http://localhost:8080/notes/get/${id}`)
    .then(response => response.json())
    .then(data =>{
      console.log(data.data);
      let notes = data.data

      notes.forEach((note) => {
        const noteElement = createNoteElement(note.id, note.content);
        notesContainer.insertBefore(noteElement, addNoteButton);
      });

    })
    .catch(err => console.error('error'));
}

function saveNotes(notes) {
  localStorage.setItem("stickynotes-notes", JSON.stringify(notes));
}

function createNoteElement(id, content) {
  const element = document.createElement("textarea");

  element.classList.add("note");
  element.value = content;
  element.placeholder = "Empty Sticky Note";

  element.addEventListener("change", () => {
    updateNote(id, element.value);
  });

  element.addEventListener("dblclick", () => {
    const doDelete = confirm(
      "Are you sure you wish to delete this sticky note?"
    );

    if (doDelete) {
      deleteNote(id, element);
    }
  });

  return element;
}

function addNote() {
  // const notes = getNotes();
  let id_user = 1;
  let content = null;
  fetch(`http://localhost:8080/notes/insert/${id_user}/${content}`)
    .then(response => response.json())
    .then(data =>{
      const noteObject = {
        id: data.id,
        content: ""
      };
    
      const noteElement = createNoteElement(noteObject.id, noteObject.content);
      notesContainer.insertBefore(noteElement, addNoteButton);
    })
    .catch(err => console.error('error'));


  // notes.push(noteObject);
  // saveNotes(notes);
}

function updateNote(id, newContent) {
  // const notes = getNotes();
  // const targetNote = notes.filter((note) => note.id == id)[0];

  // targetNote.content = newContent;
  // saveNotes(notes);
  fetch(`http://localhost:8080/notes/edit/${id}/${newContent}`)
    .then(response => response.json())
    .then(data =>{
      console.log("data update");
    })
    .catch(err => console.error('error'));
}

function deleteNote(id, element) {
  // const notes = getNotes().filter((note) => note.id != id);

  // saveNotes(notes);
  fetch(`http://localhost:8080/notes/delete/${id}`)
    .then(response => response.json())
    .then(data =>{
      console.log(data.message);
    })
    .catch(err => console.error('error'));
  
  notesContainer.removeChild(element);
}
