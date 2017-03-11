#include <stdio.h> 
#include<stdlib.h>
struct tree{
    int V,T,L;
};
/*
int partition(struct tree *arr,int low,int high)
{
int pivot,j,i;
struct tree temp;
j=low-1;
pivot=arr[high].T;
for(i=low;i<high;i++)
{
 if(arr[i].T<pivot)
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
void quicksort(struct tree *arr,int low,int high)
{
int p;
if(low<high)
{
	p=partition(arr,low,high);
quicksort(arr,low,p-1);
quicksort(arr,p+1,high);
}
}
*/
int N;
int time=0;
int findMin(struct tree *tree)
{
    int min,i,index1;
    min=tree[0].T;
    index1=0;
    for(i=1;i<N;i++)
    {
        if(tree[i].T<min)
        {
            min=tree[i].T;
            index1=i;
        }
        else if(tree[i].T==min)
        {
            if(tree[i].V>tree[index1].V)
            {
                min=tree[i].T;
                index1=i;
            }
        }
    }
    return index1;
}
int findMinimumTime(int M,struct tree *tree)
{
    int i;
    if(M<=0)
       return time;
       else
       {
            int index;
            index=findMin(tree);
            time+=tree[index].T;
            if(index!=0)
            {
                for(i=0;i<N;i++)
            {
                if(i==index)
                  tree[i].T=tree[i].L;
                else
                  tree[i].T-=tree[index].T;   
            }
               return findMinimumTime(M-tree[index].T,tree);
            }
            else
            {
                for(i=0;i<N;i++)
                {
                    if(tree[i].T==0)
                    {
                       M-=tree[i].V;
                       tree[i].T=tree[i].L;
                    }
                    else
                       tree[i].T-=tree[index].T;     
                }
                return findMinimumTime(M,tree);
            }
       }
}
int main() { 
    int i,M,Q,min;
    scanf("%d",&N);
    struct tree *tree=(struct tree *)malloc(N*sizeof(struct tree));
     
    for(i=0;i<N;i++)
    {
        scanf("%d",&tree[i].V);
    }
    for(i=0;i<N;i++)
    {
        scanf("%d",&tree[i].T);
        tree[i].L=tree[i].T;
    }
    scanf("%d",&Q);
    while(Q--)
    {
           scanf("%d",&M);
           time=0;
           min=findMinimumTime(M,tree);
           printf("%d\n",min+1);
    }
    return 0;
    }