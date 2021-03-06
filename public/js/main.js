const notesContainer = document.getElementById("app");
const addNoteButton = notesContainer.querySelector(".add-note");
const user_id = document.querySelector('meta[name="user_id"]').content;
getNotes(user_id);

addNoteButton.addEventListener("click", () => addNote());

function getNotes(user_id) {
  fetch(`http://localhost:8080/notes/get/${user_id}`)
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
  let content = null;
  fetch(`http://localhost:8080/notes/insert/${user_id}/${content}`)
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
}

function updateNote(id, newContent) {
  fetch(`http://localhost:8080/notes/edit/${id}/${newContent}`)
    .then(response => response.json())
    .then(data =>{
      console.log("data update");
    })
    .catch(err => console.error('error'));
}

function deleteNote(id, element) {
  fetch(`http://localhost:8080/notes/delete/${id}`)
    .then(response => response.json())
    .then(data =>{
      console.log(data.message);
    })
    .catch(err => console.error('error'));
  
  notesContainer.removeChild(element);
}
