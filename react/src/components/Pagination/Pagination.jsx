import React from 'react';

function Pagination(props) {
  const handleBack = () => {
    if(props.currentPage > 1){
      props.onBack(props.currentPage - 1)
    }
  }

  const handleNext = () => {
    if(props.currentPage < props.totalPage){
      props.onNext(props.currentPage + 1)
    }
  }

  return (
    <>
      <div className="w-full flex justify-center mt-3">
        <div className="px-2 py-1 bg-[#ddd] rounded cursor-pointer hover:opacity-60" onClick={handleBack}>Prev</div>
        {(props.currentPage - 1 > 0) &&
          <div className="px-2 py-1 bg-[#ddd] rounded mx-1 cursor-pointer hover:opacity-60" onClick={handleBack}>
            {props.currentPage - 1}
          </div>
        }
        <div className="px-2 py-1 bg-[#2a8ab1] text-white rounded mx-1 cursor-pointer hover:opacity-60">
          { props.currentPage }
        </div>
        {(props.currentPage + 1 <= props.totalPage) &&
          <div className="px-2 py-1 bg-[#ddd] rounded mx-1 cursor-pointer hover:opacity-60" onClick={handleNext}>
            {props.currentPage + 1}
          </div>
        }
        <div className="px-2 py-1 bg-[#ddd] rounded cursor-pointer hover:opacity-60" onClick={handleNext}>Next</div>
      </div>
    </>
  );
}

export default Pagination
