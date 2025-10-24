{{-- page 8 --}}
<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8">

                <div class="page-number">-8-</div>
                <div class="part-title">PART-5</div>

                <div>
                    <strong>1. Remarks of the Reviewing Officer</strong>
                    <p>Length of Service under the Reviewing Officer.</p>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td class="medium-text-area" style="height: 250px">
                                    {{ $formData['part_5']['reviewing_remarks'] ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <strong>2. Do you agree with the assessment made by the reporting officer with respect to the work
                        output and the various attributes in Part-3 & Part-4? Do you agree with the assessment of
                        reporting officer? In case you do not agree with any of the numerical assessments of attributes
                        please record you assessment on the column provided for you in that section and initial your
                        entries.</strong>

                    <table class="form-table" style="width: 300px; margin: 10px auto;">
                        <tr>
                            <td class="text-center">Yes</td>
                            <td class="text-center">No</td>
                        </tr>
                        <tr>
                            <td style="height: 30px; text-align: center;">
                                {{ ($formData['part_5']['agree_with_reporting_officer'] ?? '') == 'yes' ? '✓' : '' }}
                            </td>
                            <td style="height: 30px; text-align: center;">
                                {{ ($formData['part_5']['agree_with_reporting_officer'] ?? '') == 'no' ? '✓' : '' }}
                            </td>
                        </tr>
                    </table>
                </div>

                <div>
                    <strong>3. In case of disagreement please specify the reason, is there anything you wish to modify
                        or add.</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td class="medium-text-area" style="height: 250px">
                                    {{ $formData['part_5']['disagreement_reason'] ?? '' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <strong>4. Pen Picture by Reviewing Officer, please comment (in about 100words) on the overall
                        qualities of the Scientist including area of strengths and lesser strength scientific &
                        technical achievements and attitude towards weaker section.</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td class="large-text-area" style="height: 300px">
                                    {{ $formData['part_5']['pen_picture_reviewing'] ?? '' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <strong>5. Overall numerical grading on the basis of weightage given in Section A, B and C in Part
                        -3 the Report.</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td class="large-text-area" style="height: 50px">
                                    {{ $formData['part_5']['overall_numerical_grading_reviewing'] ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>


                {{-- Signature section --}}
                <div style="margin-top: 60px; ">
                    <p style="margin-bottom: 20px">Place: _______________________</p>

                    <p>Date: _______________________</p>
                    <br><br>
                    <div class="signature-section">
                        <p><strong>Signature of Reviewing Officer</strong></p>
                    </div>
                    <div style="margin-top: 40px;" class="pb-4">
                        <p><strong>Officer Name of Block Letter: </strong></p>
                        <p class="py-8"><strong>Designation: </strong></p>
                        <p><strong>The period of report: </strong></p>
                    </div>
                </div>
            </div>