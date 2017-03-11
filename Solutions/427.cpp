#include <stdio.h> 
#include<stdlib.h>
void swap(int *a,int *b)
{
	int temp;
	temp=*a;
	*a=*b;
	*b=temp;
	
}

int partition(int arr[],int low,int high)
{
int pivot,j,i,temp;
j=low-1;
pivot=arr[high];
for(i=low;i<high;i++)
{
 if(arr[i]<pivot)
 {
 	j++;
 	temp=arr[j];
 	arr[j]=arr[i];
 	arr[i]=temp;
 }
}
temp=arr[j+1];
arr[j+1]=arr[high];
arr[high]=temp;
return(j+1);
}
void quicksort(int arr[],int low,int high)
{
int p;
if(low<high)
{
	p=partition(arr,low,high);
quicksort(arr,low,p-1);
quicksort(arr,p+1,high);
}
}
int main() { 
    int n,i,j,sum=0,sum1=0;
    int *arr;
    scanf("%d",&n);
    arr=(int *)malloc(sizeof(n));
    for(i=0;i<n;i++)
    {
      scanf("%d",&arr[i]);
      for(j=0;j<=i;j++)
         sum+=arr[j];
    }         
    quicksort(arr,0,n-1);
    for(i=0;i<n;i++)
    {
        for(j=0;j<=i;j++)
          sum1+=arr[j];
    }
    printf("%d\n",(sum-sum1));
	return(0);
}