#include <iostream>
using namespace std;
int n;
void merge(int *,int, int , int );
void mergesort(int *a, int low, int high)
{
    int mid;
    if (low < high)
    {
        mid=(low+high)/2;
        mergesort(a,low,mid);
        mergesort(a,mid+1,high);
        merge(a,low,high,mid);
    }
    return;
}
void merge(int *a, int low, int high, int mid)
{
    int i, j, k, c[n];
    i = low;
    k = low;
    j = mid + 1;
    while (i <= mid && j <= high)
    {
        if (a[i] < a[j])
        {
            c[k] = a[i];
            k++;
            i++;
        }
        else
        {
            c[k] = a[j];
            k++;
            j++;
        }
    }
    while (i <= mid)
    {
        c[k] = a[i];
        k++;
        i++;
    }
    while (j <= high)
    {
        c[k] = a[j];
        k++;
        j++;
    }
    for (i = low; i < k; i++)
    {
        a[i] = c[i];
    }
}
int main() {
	// your code goes here
	cin >> n;
	int i,j,sum=0,sum1=0;
	int a[n];
	for(i=0;i<n;i++)
	    cin >> a[i];
	for(i=0;i<n;i++)
	{
	    for(j=0;j<=i;j++)
	        sum+=a[j];
	}
	mergesort(a,0,n-1);
	for(i=0;i<n;i++)
	{
	    for(j=0;j<=i;j++)
	        sum1+=a[j];
	}
	cout << sum-sum1<< endl;
	return 0;
}
