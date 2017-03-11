#include <stdio.h> 
#include<stdlib.h>
int passes=0;
int main() { 
    int N,i,*arr,j;
    arr=(int *)malloc(N*sizeof(int));
    scanf("%d",&N);
    for(i=0;i<N;i++)
     scanf("%d",&arr[i]);
     for(i=0;i<N;i++)
       {
           for(j=i;;j=j+1%N)
           {
               if(arr[j]>arr[i])
                 break;
                 else
                   passes++;
           }
       }
       printf("%d\n",passes);
    return(0);
}