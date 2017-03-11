#include <stdio.h> 
#include<stdlib.h>
void swap(int *a,int *b)
{
	int temp;
	temp=*a;
	*a=*b;
	*b=temp;
	
}


int partition(int arr[],int l,int h)
 {
 	 int pivot,i,j;
 	 pivot=arr[h];
 	 i=l-1;
 	 for(j=l;j<h;j++)
 	 {
 	 	if(arr[j]<=pivot)
 	 	   {
 	 	   	i++;
 	 	   	swap(&arr[j],&arr[i]);
 	       }
     }
 	 swap(&arr[i+1],&arr[h]);
 	 return i+1;
}
void quicksort(int arr[],int l,int h)
{
	if(l<h)
	  {
	  	int p;
	  	int n;
	  	n=sizeof(arr)/sizeof(arr[0]);
	  	p=partition(arr,l,h);
	  	quicksort(arr,0,p-1);
	  	quicksort(arr,p+1,n-1);
	  	
	  	
	  	
	  	
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