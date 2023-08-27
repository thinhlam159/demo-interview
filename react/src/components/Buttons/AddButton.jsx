function EditButton(props) {
  return (
    <>
      <button className="block bg-[#00FF00] p-2 rounded" onClick={props.onClick}>
        <i className="fa fa-pencil-square-o text-white mr-1" aria-hidden="true"></i>
        <span className="text-white">
          {props.text || "No-data"}
        </span>
      </button>
    </>
  )
}

export default EditButton
