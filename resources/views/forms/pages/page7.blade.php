{{-- Page 7 --}}
<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8">

                <div class="page-number">-7-</div>

                <div style="margin: 20px 0;">
                    <strong>4. Integrity</strong>
                    <p><em>(Please comment on the integrity of the Scientist)</em></p>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 200px; padding: 10px; border: 1px solid black;">
                                    {{ $formData['part_4']['integrity_assessment'] ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin: 30px 0;">
                    <strong>5. Pen Picture by Reporting Officer (in about 100words) on the overall qualities of the
                        Scientist including area of strengths and lesser strength extraordinary achievements, scientific
                        & technical achievements (refer 3 of Part 2) and attitude towards weaker section.</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 300px; padding: 10px; border: 1px solid black;">
                                    {{ $formData['part_4']['pen_picture_reporting'] ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin: 30px 0;">
                    <strong>6. Overall numerical grading on the basis of weightage given in Section A, B and C in Part
                        -3 of the Report.</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 150px; padding: 10px; border: 1px solid black;">
                                    {{ $formData['part_4']['overall_numerical_grading'] ?? '' }}</td>
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
                        <p><strong>Signature of Reporting Officer</strong></p>
                    </div>
                    <div style="margin-top: 40px;" class="pb-4">
                        <p><strong>Name (in Block Letters): </strong></p>
                        <p class="py-8"><strong>Designation: </strong></p>
                        <p><strong>During the period of report: </strong></p>
                    </div>
                </div>

            </div>